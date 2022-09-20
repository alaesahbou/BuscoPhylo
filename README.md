# BuscoPhylo

<br>
<img src="https://user-images.githubusercontent.com/22656460/184841359-acfdc023-d70f-46e1-9e65-d1c741a3465d.png" width="500" title="BuscoPhylo logo" align="float:right"></img>
<br>

Thanks to the advances in DNA sequencing technolgies, thousands of genome sequences of living organisms are being released in the public databases every day. <b>BuscoPhylo</b> has been implemented to provide a fully automated and complete pipeline to quickly perform BUSCO-based phylogenomic analysis starting from assembled genome sequences as inputs. BuscoPhylo is a free, on-line and user-friendly webserver accepting genome sequences in FASTA format as inputs and enabling to the user to export the tree ready for publication and all the results of the steps included in the pipeline for downstream analyses.
<br>

# BuscoPhylo workflow

```mermaid
graph TD
    
    a{{Genome sequences >= 4 <br> <i>FASTA format}} -- <i>BUSCO --> b(BUSCO outputs)
    b --> c(Get Shared single copy BUSCO genes)
    c --> |<i>muscle & trimAl| d(Individual alignments <br> for each BUSCO family gene)
    d -- <i>Seqkit --> e(Concatenate alignments)
    e --> |<i>Infering tree using <br>IQ-TREE| f(ML tree)
    f --> |<i>ETE3| g[Graphical Display]
    f --> h[Download Results]
 
        classDef green fill:#93FF33,stroke:#333,stroke-width:2px
        classDef blue fill:#00FA9A,stroke:#333,stroke-width:4px
       
        class g,a,h green
        class b,c,d,e,f blue
 ```      
 
# Installation
1. Download the application and extract the zipped file in your web server (xampp, ampps, WAMP, online server …)
````bash
# Download the BuscoPhylo source code 
git clone https://github.com/alaesahbou/BuscoPhylo.git
# Move the the BuscoPhylo dir to your your server (exmaple here lampp)
mv BuscoPhylo/ /opt/lampp/htdocs/
````
2. Setup the server
````bash
# Give BuscoPhylo root privileges using the following command
sudo chown -R daemon /BuscoPhylo_directory
sudo visudo
# insert th following lines after User privilege specification comment 
# for xampp replace USER by daemon and for ampps replace USER by ampps
[USER] ALL=(ALL:ALL) ALL
[USER] ALL=(ALL) NOPASSWD: ALL
# open the file with a text manger
vim /etc/php5/cli/php.ini
# change these lines:
max_file_uploads=5000
upload_max_filesize=8000M
post_max_size=8000M
````
3. Open BuscoPhylo tool via localhost on you browser (http://localhost/BuscoPhylo/)
4. Connect BuscoPhylo to mysql <br><br>
<i>Enter your login and password of your mysql server</i><br><br>
![image](https://user-images.githubusercontent.com/60272832/184771731-24b16890-fd31-4444-83b3-6f8d340e15ff.png)
# Requirements
- [<b>Python3](https://www.python.org/)(<code> sudo apt install python3</code>)
- [<b>Busco](https://busco.ezlab.org/)(<code>conda install -c bioconda busco</code>)
- [<b>Biopython](https://biopython.org/)(<code>conda install -c conda-forge biopython</code>)
- [<b>MUSCLE](https://www.drive5.com/muscle/)(<code>conda install -c bioconda muscle</code>)
- [<b>trimAl](http://trimal.cgenomics.org/)(<code>conda install -c bioconda trimal</code>)
- [<b>IQ-TREE](http://www.iqtree.org/)(<code>conda install -c bioconda iqtree</code>)
- [<b>ETE3](http://etetoolkit.org/)(<code>conda install -c etetoolkit ete3</code>)

# Submitting a project
1. Input Requirements
- At least 4 Genome sequence files in FASTA format (.fa,.fsa,.fasta,.fna are supported)
- File names will be used as leaf labels 
- We recommand this format <code>Genus_species_strain.fasta</code>

2. GUI input portal
<center><img src="https://user-images.githubusercontent.com/60272832/183297851-9c4afdb6-7e73-4a54-b31a-2e24aedbbb88.png"></center>

3. Output files
- **outBusco** directory containing Busco runs
- **out** directory containing the ML tree, logs, BSCg as proteins and alignments
- **pdf**, **png** and **svg** files for phylogenomic tree


# License
BuscoPhylo is licensed under the MIT License.

# Reporting bugs and feedback
If you have any suggestions, feedback and bug reports, please contact us at **slimane.khayi[at]inra.ma** or use [the contact form](https://buscophylo.inra.org.ma/contact) on the website.

# Citations
If BuscoPhylo helped with the analysis of your data, please do not forget to cite:

- Phylogenomics analyses were conducted in BuscoPhylo [(Sahbou <i>et al.,</i> 2022)](https://www.researchsquare.com/article/rs-1997596/v1)
- BUSCO V5 (Simão et al., 2015).
- Muscle and trimAl (Edgar, 2004; Capella-Gutiérrez et al., 2009).
- ML tree was inferred using IQ-TREE version 1.6.12 (Nguyen et al., 2015) with the model selection from ModelFinder (Kalyaanamoorthy et al., 2017) using the following defaults parameters: “-bb 1000 -alrt 1000 -nt AUTO -ntmax”.
- The tree file is visualized using ETE Toolkit (Huerta-Cepas et al., 2016).
