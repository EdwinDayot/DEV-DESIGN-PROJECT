
<body onload="initialiser()">

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" />

<script src="js/jquery.js" type="text/javascript"></script>
<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<section class='street-header'>   <!-- begin section -->
  
  <div id="popupbox">
  
  <form action="<?php echo Router::url('announces/post/'); ?>" method="post">
  	
                        <input type="hidden" name="id" value="">                
                        <input type="hidden" name="user_id" value=""> 
                        <input type="hidden" name="lat" value="">
                        <input type="hidden" name="lng" value="">                 
                        <a href="#"><button type="submit">Poster l'annonce !</button></a>
                        <label for="inputcontent"></label>
                        <textarea id="inputcontent" name="content" rows="10" placeholder="Annonce"></textarea>                <label for="inputaddress"></label>
                        <input type="text"  name="address" value="" placeholder="Location">
                        <div class="coords"></div>             
       </form>
  
  </div> <!-- END FORM -->
  
  <!--  MAP ZONE -->
  
          <div id="map"></div>
          
          <style>
          
          #map { width: 100%; height: 380px; margin: 0 0 0 0px;
          }
          </style>
          
         
          
            
  
  </div>
  
  
  <div class='wrapper'>
  <div class='street-logo'> <a href='/'> <img alt="street_logo" src="#" /> </a> </div>
 
  <div class='street-navigation'>
    
      <!--   menu quartier --> 
      <nav class='street-actions actions-menu'> 
        <a class='first-child selected' href='#' title='Home'> <i class='#'></i><div class='text-with-icon hidden'>Home</div></a> 
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
               <h3 href="#" class="buble-title"  data-lat="<?php echo $v->lat; ?>" data-lng="<?php echo $v->lng; ?>" >Annonce - <?php echo $v->user_id; ?></h3></a>
              <div class="buble-content">
                     <!-- text annonce -->
                     <p class="bubletxt"><?php echo $v->content; ?></p>
                     <div class='item-image'>

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


 <script>
           var map = L.map('map').setView([48.0, 2.3], 13);
           L.tileLayer('http://{s}.tile.cloudmade.com/ffdd86e27a8a46129afb5e678456afaf/997/256/{z}/{x}/{y}.png', {
               attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
               maxZoom: 18
           }).addTo(map);
           
   
/*           
           
           //ALONE POPUP
           var popup = L.popup()
               .setLatLng([51.5, -0.09])
               .setContent("I am a standalone popup.")
               .openOn(map);
               
               
               
           //EVENT CLICK COORDONNÉS
           function onMapClick(e) {
               alert("You clicked the map at " + e.latlng);
           }
           
           map.on('click', onMapClick);
           */
           
           
           //EVENT AFFICHER ANNONCES 
           $("#masterbublebox h3").each( function () {
                   var e = $(this);
                   var lat = e.attr("data-lat");
                   var lng = e.attr("data-lng");
                   console.log(lat, lng);
                   if (lat && lng) {
                       var marker = L.marker([lat, lng]).bindPopup(e.html()).addTo(map);
                       marker.on("click", function () { marker.openPopup()})
                   }
           });
           
           
           //EVENT CLICK AND POPUP COORDONNES
           var popup = L.popup();
           
           var form = $('#popupbox');
           form.remove();
           
           function onMapClick(e) {
               var coords = e.latlng;
               form.find("[name=lat]").val(coords.lat);
               form.find("[name=lng]").val(coords.lng);
               var div = form.get(0);
               popup
                   .setLatLng(e.latlng)
                   .setContent(div) //selectionner plusieurs div et parmis ces divs le premier element
                   .openOn(map);
           }
           
           map.on('click', onMapClick);
   </script>


