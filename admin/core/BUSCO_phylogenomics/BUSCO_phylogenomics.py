#!/usr/bin/env python

# Dependencies:
#   - BioPython
#   - MUSCLE
#   - trimAL
#   - IQ-TREE
#   - raxmlHPC-PTHREADS

import argparse
import multiprocessing as mp
import os
import sys
from time import gmtime, strftime

from Bio import SeqIO
from Bio.Seq import Seq
from Bio.SeqRecord import SeqRecord

# If these programs aren't in $PATH, replace the string below with full
# paths to the programs, including the program name
muscle = "muscle"
iqtree = "iqtree"
trimal = "trimal"
FastTree = "FastTree"
raxmlHPC = "raxmlHPC-PTHREADS"
outg = ""
# astral = "astral.jar"

# TODO Add FastTree support

def main():
    parser = argparse.ArgumentParser(description="Perform phylogenomic reconstruction using BUSCOs")

    parser.add_argument("-t", "--threads", type=int, help="Number of threads to use", required=True)
    parser.add_argument("-d", "--directory", type=str, help="Directory containing completed BUSCO runs", required=True)
    parser.add_argument("-o", "--output", type=str, help="Output directory to store results", required=True)
    parser.add_argument("-og", "--outgroup", type=str, help="Name of organime to root the tree", required=False)

    args = parser.parse_args()

    start_directory = os.path.abspath(args.directory)
    working_directory = os.path.abspath(args.output)
    threads = int(args.threads)
    outg = args.outgroup



    # Check input directory exists
    if os.path.isdir(start_directory):
        os.chdir(start_directory)
    else:
        print("Error! " + start_directory + " is not a directory!")

    # Check if output directory already exists
    if os.path.isdir(working_directory):
        print("Error! " + working_directory + " already exists")
        sys.exit(1)
    else:
        os.mkdir(working_directory)


    # Scan start directory to identify BUSCO runs (begin with 'run_')
    busco_dirs = []

    for item in os.listdir("."):
        if item[0:4] == "run_":
            if os.path.isdir(item):
                busco_dirs.append(item)

    print("Found " + str(len(busco_dirs)) + " BUSCO runs:")

    for directory in busco_dirs:
        print("\t" + directory)

    print("")

    buscos = {}
    all_species = []

    for directory in busco_dirs:
        os.chdir(start_directory)

        species = directory.split("run_")[1]
        all_species.append(species)

        os.chdir(directory)
        # os.chdir("run_" + lineage) # Issue with BUSCO version >= 4?
        os.chdir("busco_sequences")
        os.chdir("single_copy_busco_sequences")
        
        # print(species)

        for busco in os.listdir("."):
            if busco.endswith(".faa"):
                #print(busco)
                busco_name = busco[0:len(busco) - 4]
                record = SeqIO.read(busco, "fasta")
                new_record = SeqRecord(Seq(str(record.seq)), id=species, description="")

                if busco_name not in buscos:
                    buscos[busco_name] = []

                buscos[busco_name].append(new_record)
    # print(all_species)
    # print("BUSCO\t # Species Single Copy")
    for busco in buscos:
        print(busco + " " + str(len(buscos[busco])))

    # # print_message((str(len(buscos))) + " BUSCOs were found")
    print("")

    

    
    single_copy_buscos = []
    
    # print_message("Identifying BUSCOs that are single copy in all " + str(len(all_species)) + " species")

    for busco in buscos:
        if len(buscos[busco]) == len(all_species):
            single_copy_buscos.append(busco)

    if len(single_copy_buscos) == 0:
        # print_message("0 BUSCO families were present and single copy in all species")
        # print_message("Exiting")
        sys.exit(0)
    else:
        print(str(len(single_copy_buscos)) + " BUSCOs are single copy in all " + str(len(all_species)) + " species")
    

    os.chdir(working_directory)
    os.mkdir("proteins")
    os.mkdir("alignments")
    os.mkdir("trimmed_alignments")

    print("")

    # print_message("Writing protein sequences to: " + os.path.join(working_directory, "proteins"))

    for busco in single_copy_buscos:
        busco_seqs = buscos[busco]

        SeqIO.write(busco_seqs, os.path.join(working_directory, "proteins", busco + ".faa"), "fasta")

    print("")
    # print_message("Aligning protein sequences using MUSCLE with", threads, "threads to: ",
     #             os.path.join(working_directory, "alignments"))#to correct path to file where to store

    mp_commands = []

    for busco in single_copy_buscos:
        mp_commands.append([os.path.join(working_directory, "proteins", busco + ".faa"),
                            os.path.join(working_directory, "alignments", busco + ".aln")])

    pool = mp.Pool(processes=threads)
    results = pool.map(run_muscle, mp_commands)

    print("")
    # print_message("Trimming alignments using trimAl (-automated1) with", threads, "threads to: ",
    #              os.path.join(working_directory, "trimmed_alignments"))

    mp_commands = []

    for busco in single_copy_buscos:
        mp_commands.append([os.path.join(working_directory, "alignments", busco + ".aln"),
                                os.path.join(working_directory, "trimmed_alignments", busco + ".trimmed.aln")])

    pool = mp.Pool(processes=threads)
    results = pool.map(run_trimal, mp_commands)

    print("")
    # print_message("Concatenating all trimmed alignments for SUPERMATRIX analysis")

    os.chdir(os.path.join(working_directory, "trimmed_alignments"))
    alignments = {}
    # print(all_species)
    for species in all_species:
        alignments[species] = ""

    # if psc isn't set, or is == 100, we can simple just concatenate alignments
    
        for alignment in os.listdir("."):
            for record in SeqIO.parse(alignment, "fasta"):
                if str(record.id) == species:
                    alignments[str(record.id)] += str(record.seq)
    
    # print(alignments) 
    os.chdir(working_directory)
    fo = open("SUPERMATRIX.aln", "w")

    for species in alignments:
        fo.write(">" + species + "\n")
        fo.write(alignments[species] + "\n")

    fo.close()
    
    
    os.chdir(working_directory)
    os.system("trimal -in SUPERMATRIX.aln -out SUPERMATRIX.trimmed.aln -automated1 ")

    # print_message("Supermatrix alignment is " + str(len(alignments[species])) + " amino acids in length")

   

    # print_message("Reconstructing species phylogeny using IQ-TREE with model selection from ModelFinder, "
    #             "1000 ultrafast bootstrap approximations and 1000 SH-aLRTs: SUPERMATRIX.aln.treefile")
    print("")

#        os.system("iqtree -s SUPERMATRIX.aln -bb 1000 -alrt 1000 -nt AUTO -ntmax " + str(threads) + " > /dev/null")
    #os.system("FastTree -boot 1000  SUPERMATRIX.aln" + " > SUPERMATRIX.tree")
    if outg:
        os.system("raxmlHPC -f a -m PROTGAMMAAUTO -p 12345 -x 12345 -# 100 -s SUPERMATRIX.aln -n nwk " + " -o " + outg + " -T " + str(threads))
        os.system("raxmlHPC-PTHREADS -s " + " -o " + outg  )
    else:
        os.system("raxmlHPC -f a -m PROTGAMMAAUTO -p 12345 -x 12345 -# 100 -s SUPERMATRIX.aln -n nwk " + " -T " + str(threads))
        os.system("raxmlHPC-PTHREADS -s ")
    os.system("raxmlHPC -f b -m PROTGAMMAILG -n output_bootstrap.tre -t RAxML_bestTree* -z RAxML_bootstrap.nwk")
    print("")
    # print_message("SUPERMATRIX phylogeny construction complete! See treefile: SUPERMATRIX.aln.treefile")


def run_muscle(io):
    os.system("muscle -in " + io[0] + " -out " + io[1] + " > /dev/null 2>&1")#modified options to new version

def run_trimal(io):
    os.system("trimal -in " + io[0] + " -out " + io[1] + " -automated1 ")


if outg != "":
    def run_raxml(io):
        os.system("raxmlHPC-PTHREADS -s " + " -o " + outg  ) 
    def run_iqtree(io):
        os.system("iqtree -s " + io[0] + " -o " + outg + " > /dev/null 2>&1")
else:
    def run_raxml(io):
        os.system("raxmlHPC-PTHREADS -s ") 
    def run_iqtree(io):
        os.system("iqtree -s " + io[0] + " > /dev/null 2>&1")

def print_message(*message):
    print(strftime("%d-%m-%Y %H:%M:%S", gmtime()) + "\t" + " ".join(map(str, message)))

if __name__ == "__main__":
    main()
