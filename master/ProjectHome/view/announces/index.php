
<body onload="initialiser()">

<section class='street-header'>   <!-- begin section -->
  
  
  <!--  MAP ZONE -->
  
  <div id="googft-mapCanvas" class="coverimage">
  
  <style type="text/css">
  
  #googft-mapCanvas {
  height: 500px;
  width: 1200px;
  
  }
  
  .googft-card-view {
      background-color: red;;
  }
  
  .googft-info-window {
      background-color: white;
      width: 200px;
      height: 100px;
      overflow: scroll;
  }
  
  .googft-info-window .name {
      font-size: 20px;
  }
  
  
  .googft-info-window p {
      
  }
  
  #googft-legend{background-color:#8A2BE2;border:1px solid #000;font-family:Arial, sans-serif;font-size:12px;margin:5px;padding:10px 10px 8px;}#googft-legend p{font-weight:bold;margin-top:0;}#googft-legend div{margin-bottom:5px;}.googft-legend-swatch{border:1px solid;float:left;height:12px;margin-right:8px;width:20px;}.googft-legend-range{margin-left:0;}.googft-dot-icon{margin-right:8px;}.googft-paddle-icon{height:24px;left:-8px;margin-right:-8px;position:relative;vertical-align:middle;width:24px;}.googft-legend-source{margin-bottom:0;margin-top:8px;
  }.googft-legend-source a{color:#8A2BE2;font-size:11px;}
  </style>
  
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  
  <script type="text/javascript">
  function initialize() {
  //MAP OPTIONS
  map = new google.maps.Map(document.getElementById('googft-mapCanvas'), {
  center: new google.maps.LatLng(48.872640046878544, 2.318897311328101),
  zoom: 13,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  
  
  
  var infowindow = new google.maps.InfoWindow();
  //infowindow.css("border-radius:10px;")
  
  
  layer = new google.maps.FusionTablesLayer({
  map: map,
  
  heatmap: { enabled: false },
  query: {
  select: "col2",
  from: "1vPDmX26P2d0Jt6jAkfkAKbyxzMwBU7hZ4mormeA",
  where: ""
  },
  options: {
  
  }
  });
  }
  
  
  google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  
  
  </div>
  
  
  <div class='wrapper'>
  <div class='street-logo'> <a href='/'> <img alt="street_logo" src="assets/img/idea-brand.png" /> </a> </div>
 
  <div class='street-navigation'>
    
      <!--   menu quartier --> 
      <nav class='street-actions actions-menu'> 
        <a class='first-child selected' href='membre.html' title='Home'> <i class='#'></i><div class='text-with-icon hidden'>Home</div></a> 
        <a class='' href='#i' title='New listing'> <i class='#'></i><div class='text-with-icon hidden'>New Annonces</div></a> 
        <a class='' href='#' title='Community'> <i class='#'></i><div class='text-with-icon hidden'>Voisinage</div></a>
      </nav> <!--  end menu quartier --> 
      
    </div>
  </div>
</section>  <!-- end map header -->


<section class='wrapper'>   <!-- begin section -->
  
  
  <div class='page-content'>  <!-- ALTTTT begin annonce content -->
        
          <div class='feed-navigation'>
            
            
            <!-- feed action 2-->
            <div class='feed-actions actions-menu'> <a class='request-link' href='#'> <i class='#'></i>
              <div class='text-with-icon' id='post_new_listing'>Répondre !</div></a>
            </div>
          
            
            
            <form class="form-wrapper cf" action="<?php echo Router::url('announces/post/'.$id); ?>" method="post">
                <?php echo $this->Form->input('id','hidden'); ?>
                <?php echo $this->Form->input('user_id', 'hidden'); ?>
                
                <a href="#"><button type="submit">Poster l'annonce !</button></a>
                <label for="inputcontent"></label>
                <?php echo $this->Form->input('content','Contenu',array(
                	'type' => 'textarea',
                	'class' => 'input-xxlarge wysiwyg',
                	'rows'	=> 10,
                	'placeholder' => 'Annonce'
                )); ?>
                <label for="inputaddress"></label>
                <?php echo $this->Form->input('address', 'Lieu' , array( 'placeholder' => 'Location')); ?>
                <!-- MARCHE PAS -->
                <!--<label for="inputaddress"></label>
                <?php echo $this->Form->input('name', 'Nom' , array( 'placeholder' => 'Nom')); ?>
                <input type="text" placeholder="Mon Nom" required>-->
                 
            </form>
            
            
          </div> <!-- End feedaction -->



      
      <div id="masterbublebox"><!-- master buble box -->  
      
              <?php foreach ($announces as $k => $v): ?> 
              <!-- ZOOM bublebox CHAQUE annonce --> 
          
        <!-- ZOOM bublebox // annonce --> 
            
            <div class="buble zoombox">
              <div class="arrow"></div>
               <h3 href="#" class="buble-title">Annonce - <?php echo $v->user_id; ?></h3></a>
              <div class="buble-content">
                     <!-- text annonce -->
                     <p class="bubletxt"><?php echo $v->content; ?></p>
                     <div class='item-image'>
                     <a href='#' id='listing-image-link'>
                     <img alt="object to show or sale" src="assets/img/cheval.png" />
                     </a>
                     </div>
                      <!-- Auteur -->
                     <div class='annonce-author'>
                         <div class='annonce-author-image'>
                             <a href="#autorprofile"><img alt="author" src="assets/img/lea.jpg" /></a>
                         </div>
                         <div class='annonce-author-description'>
                             <h3>
                             Adresse : 
                             <a href="<?php echo Router::url("announces/view/id:{$v->id}"); ?>" id="annonce_author_link"><?php echo $v->address; ?></a>
                             </h3>
                          </div>
                      </div>


                      <!-- infos Annonce time vues -->
                     <ul class='buble-info'>
                         <li class='icon-with-text-container'>
                             <i class='ss-calendar icon-part'></i>
                             <div class='text-part'>
                                 Created 22 hours ago
                             </div>
                         </li>
                         <li class='icon-with-text-container'>
                             <i class='ss-view icon-part'></i>
                             <div class='text-part'>
                                 Viewed
                                 47 times
                             </div>
                         </li>
                     </ul>
                     
              </div>
            </div>
            
            
            	
            	<?php endforeach ?>
            </div><!-- END master buble box --> 
            

        
  
        
    </div> <!-- ALTTT  END page content -->
    

<div class="pagination">
    <ul>
    	<?php for($i=1; $i <= $page; $i++): ?>
    		<li <?php if($i==$this->request->page){ echo 'class="active"'; }?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    	<?php endfor; ?>
    </ul>
</div>
  
  
</section>  <!-- end wrapper section -->



<!-- SCRIPTS -->


