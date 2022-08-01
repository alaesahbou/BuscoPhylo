<?php 
if(isset($_GET["q"])){
    if($_GET["q"]=="add_done" && isset($_SESSION['project'])){
        $stat=1;
    } else { $stat=0; }
}
?>
        <style type="text/css">
         @media only screen and (min-width: 800px) {
             #add {
            width: 50%;
            margin-left: 25%;
            color: white;
          }
         }
          main input, main select {
            margin-bottom: 10px;
          }
          main .btn {
            width: 50%;
            margin-left: 25%;
          }
          <style>
    @media only screen and (max-width: 800px) {
  #add {
            width: 80%;
            margin-left: 10%;
            color: white;
}
</style>
        </style>

<div class="catalog">
  <div class="container">
    <div class="row" id="add">
      <div class="col-12">
          <div class="main__title">
            <?php if($stat==1){ ?><h4 style="text-align: center; color:red">YOU CAN CHECK THE PROJECT PROGRESS USING Project ID : <?php echo $_SESSION['project']; ?> OR IF YOU ARE USING AN ACCOUNT YOU WILL FIND YOUR PROJECTS LIST IN THE DASHBOARD</h4><?php } if($_SESSION['reply']=="011"){ ?><h4 style="text-align: center; color:red">Project "<?php echo $_SESSION['proj_name']; ?>" deleted successfully</h4><?php $_SESSION['reply']="0"; } ?>
            <?php if(isset($_SESSION['format'])){
                echo '<h4 style="text-align: center; color:red">'.$_SESSION['format'].'</h4>';
                $_SESSION['format']="";
            }
            ?>
            <h2 style="text-align: center;color:#131720;" id="project__add--title">Create New Project</h2>
          </div>
        </div>

        <div class="col-12">
            <main class="main">
              <form id="app_frm_c" action="admin/core/new_item" method="POST" autocomplete="OFF" class="form" enctype="multipart/form-data">
                
                <?php if(!isset($email)){ ?><div class="form__group">
                      <input required name="email_user" type="text" class="form__input txt-cap" placeholder="Your E-mail">
                    </div><?php } else {?><div class="form__group">
                      <input name="email_user" type="text" class="form__input txt-cap" value="<?php echo $email; ?>" hidden>
                    </div><?php } ?>
                
                <div class="form__group">
                      <input required name="Project_Name" type="text" class="form__input txt-cap" pattern="[a-zA-Z0-9_]{3,}" placeholder="Project Name (space not allowed)">
                    </div>
                    <div class="form__group">
                      <select name="lineage" required class="form__input txt-cap" id="quality">
                        <option value="">Select Lineage</option>
                    <option value='acidobacteria_odb10'>acidobacteria_odb10</option>
                    <option value='aconoidasida_odb10'>aconoidasida_odb10</option>
                    <option value='actinobacteria_class_odb10'>actinobacteria_class_odb10</option>
                    <option value='actinobacteria_phylum_odb10'>actinobacteria_phylum_odb10</option>
                    <option value='actinopterygii_odb10'>actinopterygii_odb10</option>
                    <option value='agaricales_odb10'>agaricales_odb10</option>
                    <option value='agaricomycetes_odb10'>agaricomycetes_odb10</option>
                    <option value='alphaproteobacteria_odb10'>alphaproteobacteria_odb10</option>
                    <option value='alteromonadales_odb10'>alteromonadales_odb10</option>
                    <option value='alveolata_odb10'>alveolata_odb10</option>
                    <option value='apicomplexa_odb10'>apicomplexa_odb10</option>
                    <option value='aquificae_odb10'>aquificae_odb10</option>
                    <option value='arachnida_odb10'>arachnida_odb10</option>
                    <option value='archaea_odb10'>archaea_odb10</option>
                    <option value='arthropoda_odb10'>arthropoda_odb10</option>
                    <option value='ascomycota_odb10'>ascomycota_odb10</option>
                    <option value='aves_odb10'>aves_odb10</option>
                    <option value='bacillales_odb10'>bacillales_odb10</option>
                    <option value='bacilli_odb10'>bacilli_odb10</option>
                    <option value='bacteria_odb10'>bacteria_odb10</option>
                    <option value='bacteroidales_odb10'>bacteroidales_odb10</option>
                    <option value='bacteroidetes-chlorobi_group_odb10'>bacteroidetes-chlorobi_group_odb10</option>
                    <option value='bacteroidetes_odb10'>bacteroidetes_odb10</option>
                    <option value='bacteroidia_odb10'>bacteroidia_odb10</option>
                    <option value='basidiomycota_odb10'>basidiomycota_odb10</option>
                    <option value='betaproteobacteria_odb10'>betaproteobacteria_odb10</option>
                    <option value='boletales_odb10'>boletales_odb10</option>
                    <option value='brassicales_odb10'>brassicales_odb10</option>
                    <option value='burkholderiales_odb10'>burkholderiales_odb10</option>
                    <option value='campylobacterales_odb10'>campylobacterales_odb10</option>
                    <option value='capnodiales_odb10'>capnodiales_odb10</option>
                    <option value='carnivora_odb10'>carnivora_odb10</option>
                    <option value='cellvibrionales_odb10'>cellvibrionales_odb10</option>
                    <option value='cetartiodactyla_odb10'>cetartiodactyla_odb10</option>
                    <option value='chaetothyriales_odb10'>chaetothyriales_odb10</option>
                    <option value='chlamydiae_odb10'>chlamydiae_odb10</option>
                    <option value='chlorobi_odb10'>chlorobi_odb10</option>
                    <option value='chloroflexi_odb10'>chloroflexi_odb10</option>
                    <option value='chlorophyta_odb10'>chlorophyta_odb10</option>
                    <option value='chromatiales_odb10'>chromatiales_odb10</option>
                    <option value='chroococcales_odb10'>chroococcales_odb10</option>
                    <option value='clostridiales_odb10'>clostridiales_odb10</option>
                    <option value='clostridia_odb10'>clostridia_odb10</option>
                    <option value='coccidia_odb10'>coccidia_odb10</option>
                    <option value='coriobacteriales_odb10'>coriobacteriales_odb10</option>
                    <option value='coriobacteriia_odb10'>coriobacteriia_odb10</option>
                    <option value='corynebacteriales_odb10'>corynebacteriales_odb10</option>
                    <option value='cyanobacteria_odb10'>cyanobacteria_odb10</option>
                    <option value='cyprinodontiformes_odb10'>cyprinodontiformes_odb10</option>
                    <option value='cytophagales_odb10'>cytophagales_odb10</option>
                    <option value='cytophagia_odb10'>cytophagia_odb10</option>
                    <option value='delta-epsilon-subdivisions_odb10'>delta-epsilon-subdivisions_odb10</option>
                    <option value='deltaproteobacteria_odb10'>deltaproteobacteria_odb10</option>
                    <option value='desulfobacterales_odb10'>desulfobacterales_odb10</option>
                    <option value='desulfovibrionales_odb10'>desulfovibrionales_odb10</option>
                    <option value='desulfurococcales_odb10'>desulfurococcales_odb10</option>
                    <option value='desulfuromonadales_odb10'>desulfuromonadales_odb10</option>
                    <option value='diptera_odb10'>diptera_odb10</option>
                    <option value='dothideomycetes_odb10'>dothideomycetes_odb10</option>
                    <option value='embryophyta_odb10'>embryophyta_odb10</option>
                    <option value='endopterygota_odb10'>endopterygota_odb10</option>
                    <option value='enterobacterales_odb10'>enterobacterales_odb10</option>
                    <option value='entomoplasmatales_odb10'>entomoplasmatales_odb10</option>
                    <option value='epsilonproteobacteria_odb10'>epsilonproteobacteria_odb10</option>
                    <option value='euarchontoglires_odb10'>euarchontoglires_odb10</option>
                    <option value='eudicots_odb10'>eudicots_odb10</option>
                    <option value='euglenozoa_odb10'>euglenozoa_odb10</option>
                    <option value='eukaryota_odb10'>eukaryota_odb10</option>
                    <option value='eurotiales_odb10'>eurotiales_odb10</option>
                    <option value='eurotiomycetes_odb10'>eurotiomycetes_odb10</option>
                    <option value='euryarchaeota_odb10'>euryarchaeota_odb10</option>
                    <option value='eutheria_odb10'>eutheria_odb10</option>
                    <option value='fabales_odb10'>fabales_odb10</option>
                    <option value='firmicutes_odb10'>firmicutes_odb10</option>
                    <option value='flavobacteriales_odb10'>flavobacteriales_odb10</option>
                    <option value='flavobacteriia_odb10'>flavobacteriia_odb10</option>
                    <option value='fungi_odb10'>fungi_odb10</option>
                    <option value='fusobacteriales_odb10'>fusobacteriales_odb10</option>
                    <option value='fusobacteria_odb10'>fusobacteria_odb10</option>
                    <option value='gammaproteobacteria_odb10'>gammaproteobacteria_odb10</option>
                    <option value='glires_odb10'>glires_odb10</option>
                    <option value='glomerellales_odb10'>glomerellales_odb10</option>
                    <option value='halobacteriales_odb10'>halobacteriales_odb10</option>
                    <option value='halobacteria_odb10'>halobacteria_odb10</option>
                    <option value='haloferacales_odb10'>haloferacales_odb10</option>
                    <option value='helotiales_odb10'>helotiales_odb10</option>
                    <option value='hemiptera_odb10'>hemiptera_odb10</option>
                    <option value='hymenoptera_odb10'>hymenoptera_odb10</option>
                    <option value='hypocreales_odb10'>hypocreales_odb10</option>
                    <option value='insecta_odb10'>insecta_odb10</option>
                    <option value='lactobacillales_odb10'>lactobacillales_odb10</option>
                    <option value='laurasiatheria_odb10'>laurasiatheria_odb10</option>
                    <option value='legionellales_odb10'>legionellales_odb10</option>
                    <option value='leotiomycetes_odb10'>leotiomycetes_odb10</option>
                    <option value='lepidoptera_odb10'>lepidoptera_odb10</option>
                    <option value='liliopsida_odb10'>liliopsida_odb10</option>
                    <option value='mammalia_odb10'>mammalia_odb10</option>
                    <option value='metazoa_odb10'>metazoa_odb10</option>
                    <option value='methanobacteria_odb10'>methanobacteria_odb10</option>
                    <option value='methanococcales_odb10'>methanococcales_odb10</option>
                    <option value='methanomicrobiales_odb10'>methanomicrobiales_odb10</option>
                    <option value='methanomicrobia_odb10'>methanomicrobia_odb10</option>
                    <option value='micrococcales_odb10'>micrococcales_odb10</option>
                    <option value='microsporidia_odb10'>microsporidia_odb10</option>
                    <option value='mollicutes_odb10'>mollicutes_odb10</option>
                    <option value='mollusca_odb10'>mollusca_odb10</option>
                    <option value='mucorales_odb10'>mucorales_odb10</option>
                    <option value='mucoromycota_odb10'>mucoromycota_odb10</option>
                    <option value='mycoplasmatales_odb10'>mycoplasmatales_odb10</option>
                    <option value='natrialbales_odb10'>natrialbales_odb10</option>
                    <option value='neisseriales_odb10'>neisseriales_odb10</option>
                    <option value='nematoda_odb10'>nematoda_odb10</option>
                    <option value='nitrosomonadales_odb10'>nitrosomonadales_odb10</option>
                    <option value='nostocales_odb10'>nostocales_odb10</option>
                    <option value='oceanospirillales_odb10'>oceanospirillales_odb10</option>
                    <option value='onygenales_odb10'>onygenales_odb10</option>
                    <option value='oscillatoriales_odb10'>oscillatoriales_odb10</option>
                    <option value='passeriformes_odb10'>passeriformes_odb10</option>
                    <option value='pasteurellales_odb10'>pasteurellales_odb10</option>
                    <option value='planctomycetes_odb10'>planctomycetes_odb10</option>
                    <option value='plasmodium_odb10'>plasmodium_odb10</option>
                    <option value='pleosporales_odb10'>pleosporales_odb10</option>
                    <option value='poales_odb10'>poales_odb10</option>
                    <option value='polyporales_odb10'>polyporales_odb10</option>
                    <option value='primates_odb10'>primates_odb10</option>
                    <option value='propionibacteriales_odb10'>propionibacteriales_odb10</option>
                    <option value='proteobacteria_odb10'>proteobacteria_odb10</option>
                    <option value='pseudomonadales_odb10'>pseudomonadales_odb10</option>
                    <option value='rhizobiales_odb10'>rhizobiales_odb10</option>
                    <option value='rhizobium-agrobacterium_group_odb10'>rhizobium-agrobacterium_group_odb10</option>
                    <option value='rhodobacterales_odb10'>rhodobacterales_odb10</option>
                    <option value='rhodospirillales_odb10'>rhodospirillales_odb10</option>
                    <option value='rickettsiales_odb10'>rickettsiales_odb10</option>
                    <option value='saccharomycetes_odb10'>saccharomycetes_odb10</option>
                    <option value='sauropsida_odb10'>sauropsida_odb10</option>
                    <option value='selenomonadales_odb10'>selenomonadales_odb10</option>
                    <option value='solanales_odb10'>solanales_odb10</option>
                    <option value='sordariomycetes_odb10'>sordariomycetes_odb10</option>
                    <option value='sphingobacteriia_odb10'>sphingobacteriia_odb10</option>
                    <option value='sphingomonadales_odb10'>sphingomonadales_odb10</option>
                    <option value='spirochaetales_odb10'>spirochaetales_odb10</option>
                    <option value='spirochaetes_odb10'>spirochaetes_odb10</option>
                    <option value='spirochaetia_odb10'>spirochaetia_odb10</option>
                    <option value='stramenopiles_odb10'>stramenopiles_odb10</option>
                    <option value='streptomycetales_odb10'>streptomycetales_odb10</option>
                    <option value='streptosporangiales_odb10'>streptosporangiales_odb10</option>
                    <option value='sulfolobales_odb10'>sulfolobales_odb10</option>
                    <option value='synechococcales_odb10'>synechococcales_odb10</option>
                    <option value='synergistetes_odb10'>synergistetes_odb10</option>
                    <option value='tenericutes_odb10'>tenericutes_odb10</option>
                    <option value='tetrapoda_odb10'>tetrapoda_odb10</option>
                    <option value='thaumarchaeota_odb10'>thaumarchaeota_odb10</option>
                    <option value='thermoanaerobacterales_odb10'>thermoanaerobacterales_odb10</option>
                    <option value='thermoplasmata_odb10'>thermoplasmata_odb10</option>
                    <option value='thermoproteales_odb10'>thermoproteales_odb10</option>
                    <option value='thermoprotei_odb10'>thermoprotei_odb10</option>
                    <option value='thermotogae_odb10'>thermotogae_odb10</option>
                    <option value='thiotrichales_odb10'>thiotrichales_odb10</option>
                    <option value='tissierellales_odb10'>tissierellales_odb10</option>
                    <option value='tissierellia_odb10'>tissierellia_odb10</option>
                    <option value='tremellomycetes_odb10'>tremellomycetes_odb10</option>
                    <option value='verrucomicrobia_odb10'>verrucomicrobia_odb10</option>
                    <option value='vertebrata_odb10'>vertebrata_odb10</option>
                    <option value='vibrionales_odb10'>vibrionales_odb10</option>
                    <option value='viridiplantae_odb10'>viridiplantae_odb10</option>
                    <option value='xanthomonadales_odb10'>xanthomonadales_odb10</option>
                      </select>
                    </div>
                    <div class="form__group">
                      <select name="mode" required class="form__input txt-cap" id="quality">
                        <option value=''>Mode</option>
                        <option value='genome'>genome</option>
                    <option value='proteins'>proteins</option>
                    <option value='transcriptome'>transcriptome</option>
                      </select>
                    </div>
                    <div class="form__group">
                      <input class="form__input txt-cap" type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple" style="padding-top: 1%" accept=".fa,.fasta,.fsa,.faa,.fna" required>
                    </div>
                    
                    <div class="form__group">
                      <select id="fp" name="Project_groupe" class="form__input txt-cap" onchange="checkbutton()" disabled>
                        <option value="" >OutGroup</option>
                      </select>
                    </div>
                    <style>
                        input:disabled {
   background-color: grey;
}
#submit:disabled {
   background-color: grey;
}
#submit {
     background-color: orange;
}
                    </style>
                    <div class="form__group">
                      <input type="submit" name="submit" id="submit" value="Submit" class="btn form__input txt-cap" style="color: #fff;" disabled>
                    </div>
              </form>
            </main>

        <div class="row row--grid" id="movie_grid">



        </div>
      </div>
    </div>

  </div>
</div>
<script>
    document.getElementById('fileToUpload').onchange = function () {
  var fi = document.getElementById('fileToUpload'); // GET THE FILE INPUT AS VARIABLE.

        var totalFileSize = 0;

        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        if (fi.files.length > 0)
        {
            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++)
            {
                //ACCESS THE SIZE PROPERTY OF THE ITEM OBJECT IN FILES COLLECTION. IN THIS WAY ALSO GET OTHER PROPERTIES LIKE FILENAME AND FILETYPE
                var fsize = fi.files.item(i).size;
                totalFileSize = totalFileSize + fsize;
                document.getElementById('fp').innerHTML =
                document.getElementById('fp').innerHTML
                +
                '<option value="' + fi.files.item(i).name.replace(/\.[^/.]+$/, "") + '">' + fi.files.item(i).name.replace(/\.[^/.]+$/, "") + '</option>';
            }
            document.getElementById('fp').disabled = false;
            document.getElementById('submit').disabled = false;
        }
    
};
</script>

