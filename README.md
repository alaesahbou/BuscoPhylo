# BuscoPhylo
Thanks to the advances in DNA sequencing technolgies, thousands of genome sequences of living organisms are being released in the public databases every day.  **BuscoPhylo** has been implemented to provide a fully automated and complete pipeline to quickly perform BUSCO-based phylogenomic analysis starting from assembled genome sequences as inputs. The BuscoPhylo is a free, on-line and user-friendly webserver accepting genome sequences in FASTA format as inputs and enabling to the user to export the tree ready for publication and all the results of the steps included in the pipeline for downstream analyses.
 <br>
<img src="https://user-images.githubusercontent.com/22656460/182361469-27351a30-7a7d-441e-9824-967b1078b161.png" align="center" width="600">

# Installation
## Source
Download the application from GitHub https://github.com/alaesahbou/BuscoPhylo, and extract the zipped file in your server (xampp, ampps, WAMP, online server …)
Then configure your database setting by editing the file <code>config.app.php</code>
````bash
# Download the BuscoPhylo source code 
git clone https://github.com/alaesahbou/BuscoPhylo.git
# Move the the BuscoPhylo dir to your your server (exmaple here lampp)
mv BuscoPhylo /opt/lampp/htdocs/
# Login as Root
sudo -s
# Give daemon access folder
chown daemon path/to/app_dir
````

## Configure php
````bash
# open the file with a text manger
vim /etc/php5/cli/php.ini
# change these lines:
max_file_uploads=5000
upload_max_filesize=8000M
post_max_size=8000M
````

# Requirements
<ul>
  <li><code><a href="https://busco.ezlab.org/busco_userguide.html">BUSCO</a></code></li>
  <li><code><a href="https://www.python.org/">Python</a></code></li>
  <li><code><a href="https://biopython.org/">BioPython</a></code></li>
  <li><code><a href="https://www.drive5.com/muscle/">MUSCLE (v5)</a></code></li>
  <li><code><a href="http://trimal.cgenomics.org/">trimAl</a></code></li>
  <li><code><a href="http://https://raxml-ng.vital-it.ch/#/" >RAxML</a></code></li>
  <li><code><a href="http://etetoolkit.org/download/">ETE3</a></code></li>
</ul>

# Submitting a project
## Input Requirements
- At least 4 Genome sequence files in FASTA format (.fa,.fsa,.fasta,.fna are supported)
- The names of the file wiill be used as leaf labels 
- We recommand this format <code>Genus_species_strain.fasta</code> 

## Output files
- outBusco dir contain Busco runs
- out dir containing the ML tree, logs, proteins and alignments
- pdf png svg files for phylogenomic tree

<center><img src="https://user-images.githubusercontent.com/60272832/183297717-6a390f18-ac0a-438d-ad00-38cad7232024.png"></center>
<h2>Creatre Project :</h2>
<h3>Insertion :</h3>

<center><img src="https://user-images.githubusercontent.com/60272832/183297851-9c4afdb6-7e73-4a54-b31a-2e24aedbbb88.png"></center>
<h3>Show data :</h3>
<center><img src="https://user-images.githubusercontent.com/60272832/183297795-80c89a47-7fcd-4565-92c2-59769df06142.png"></center>

# BuscoPhylo workflow
```mermaid
graph TD
    
    a{{Genome sequences >= 4 <br> <i>FASTA format}} -- <i>BUSCO --> b(BUSCO outputs)
    b --> c(Get Shared single copy BUSCO genes)
    c --> |<i>muscle & trimAl| d(Individual alignments <br> for each BUSCO family gene)
    d -- <i>Seqkit --> e(Concatenate alignments)
    e --> |<i>Infering tree using <br>RAxML| f(ML tree)
    f --> |<i>ETE3| g[Graphical Display]
    f --> h[Download Results]
 



        classDef green fill:#93FF33,stroke:#333,stroke-width:2px
        classDef blue fill:#00FA9A,stroke:#333,stroke-width:4px
       
        class g,a,h green
        class b,c,d,e,f blue
 ```      
# Citations
If you use BuscoPhylo, please cite these tools:
• BUSCO V5 (Simão et al., 2015).
• Muscle and trimAl (Edgar, 2004; Capella-Gutiérrez et al., 2009).
• ML tree was inferred using RAxML version 8.2.11 (Stamatakis, 2014) with the following defaults parameters: “-f a -m PROTGAMMAAUTO -p 12345 -x 12345 -# 100”.
• The tree file is visualized using ETE Toolkit (Huerta-Cepas et al., 2016).
