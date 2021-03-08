<!-- Protocole Field -->
<div class="form-group col-sm-6">
    {!! Form::label('protocole', 'choisissez le protocole:') !!}
    {!! Form::select('protocole', ['https' => 'https', 'http' => 'http'], null, ['class' => 'form-control']) !!}
</div>

<!-- Nom domaine Field -->
<div class="form-group col-sm-6">

    {!! Form::label('domaine_id', 'Nom domaine:') !!}
    <select name="domaine_id" id="domaine_id" class="form-control">
        @foreach($tmp as $item)
          @if ($item->deleted_at === NULL)
            <option value="{{ $item->id }}">{{ $item->nomD }}</option>
          @endif
        @endforeach
      </select>
   </div>

<!-- Nom Site Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_site', 'Nom Site:') !!}
    {!! Form::text('nom_site', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Site Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description_site', 'Description Site:') !!}
    {!! Form::textarea('description_site', null, ['class' => 'form-control']) !!}
</div>

  <div class="form-group col-sm-12">
      <div class="form-group col-sm-4">
        <fieldset>
          <legend><b>Language:</b></legend>
            <select class="custom-select mr-sm-2" name="radio" id="radio">
                 <option value="fr_FR" selected>French</option>
                 <option value="en_US">English</option>                 
                 <option value="ar">Arabic</option>
                 <option value="de_DE">German</option>
                 <option value="it_IT">Italian</option>
                 <option value="es_ES">Spanish</option>
                 <option value="nl_NL">Dutch</option>
                 <option value="zh_CN">Chinese-Simplified</option>
                 <option value="zh_TW">Chinese-Traditional</option>
                 <option value="pt_BR">Portuguese</option>
                 <option value="da_DK">Danish</option>
                 <option value="pl_PL">Polish</option>
                 <option value="ru_RU">Russian</option>
                 <option value="sv_SE">Swedish</option>
                 <option value="tr_TR">Turkish</option>
                 <option value="vi">Vietnamese</option>
                 <option value="th">Thai</option>
                 <option value="hr">Croatian</option>
                 <option value="hu_HU">Hungarian</option>
                 <option value="id_ID">Indonesian</option>
            </select> 
        </fieldset>
        <br>
        <fieldset>
          <legend><b>Theme:</b></legend>
          <select class="custom-select" name="Theme" id="Theme">
                  <option value="twentytwenty" selected>twentytwenty</option>
                  <option value="twentysixteen">twentysixteen</option>
                  <option value="highlight">highlight</option>
                  <option value="rife-free">rife-free</option>
                  <option value="open-shop">open-shop</option>
                  <option value="mesmerize">mesmerize</option>
                  <option value="total">total</option>
                  <option value="futurio">futurio</option>
                  <option value="vilva">vilva</option>
                  <option value="ascension">ascension</option>
                  <option value="newsever">newsever</option>
                  <option value="timesnews">timesnews</option>
                  <option value="orchid-store">orchid-store</option>
                  <option value="twentyten">twentyten</option>
                  <option value="refined-news">refined-news</option>
                  <option value="newses">newses</option>
                  <option value="bam">bam</option>
                  <option value="escapade">escapade</option>
                  <option value="twentythirteen">twentythirteen</option>
                  <option value="twentyseventeen">twentyseventeen</option>
                  <option value="twentynineteen">twentynineteen</option>
                  <option value="astra">astra</option>
                  <option value="hello-elementor">hello-elementor</option>
                  <option value="oceanwp">oceanwp</option>
                  <option value="neve">neve</option>
                  <option value="go">go</option>
                  <option value="generatepress">generatepress</option>
                  <option value="hestia">hestia</option>
                  <option value="twentyfifteen">twentyfifteen</option>
                  <option value="colibri-wp">colibri-wp</option>
                  <option value="storefront">storefront</option>
                  <option value="calliope">calliope</option>
                  <option value="envo-shop">envo-shop</option>
                  <option value="sydney">sydney</option>
                  <option value="zakra">zakra</option>
                  <option value="newsup">newsup</option>
                  <option value="twentyfourteen">twentyfourteen</option>
                  <option value="envo-storefront">envo-storefront</option>
                  <option value="ashe">ashe</option>
                  <option value="sinatra">sinatra</option>
                  <option value="customify">customify</option>
                  <option value="amphibious">amphibious</option>
                  <option value="colormag">colormag</option>
                  <option value="onepress">onepress</option>
                  <option value="uptown-style">uptown-style</option>
                  <option value="twentytwelve">twentytwelve</option>
                  <option value="shapely">shapely</option>
                  <option value="twentyeleven">twentyeleven</option>
                  <option value="lyrical">lyrical</option>
                  <option value="velux">velux</option>
                  <option value="phlox">phlox</option>
                  <option value="ecommerce-zone">ecommerce-zone</option>
            </select> 
        </fieldset>
            <br>
        <fieldset>
               <legend><b>Calendar:</b><h style="font-size:16px">(Facultatif)<h></legend>
                  <input type="checkbox" id="Calendar" name="Calendar" value="Calendar">
                  <label for="Calendar"> Calendar</label><br>
               </select> 
        </fieldset>
            <br>
        <fieldset>
               <legend><b>Meta:</b><h style="font-size:16px">(Facultatif)<h></legend>
                  <input type="checkbox" id="meta" name="meta" value="meta-6">
                  <label for="meta"> meta-6</label><br>
               </select> 
        </fieldset>
      </div>
      <div class="form-group col-sm-2">

      </div>

      <div class="form-group col-sm-4">
          <fieldset>
            <legend><b>Plugins:</b><h style="font-size:16px">(Facultatif)<h></legend>
          <input type="checkbox" id="classic-editor" name="Plugin" value="classic-editor">
          <label for="Plugin"> Classic editor</label><br>
          <input type="checkbox" id="wordpress-seo" name="Plugin" value="wordpress-seo">
          <label for="Plugin"> Wordpress seo</label><br>
          <input type="checkbox" id="elementor" name="Plugin" value="elementor">
          <label for="Plugin"> Elementor</label><br>
          <input type="checkbox" id="wpforms-lite" name="Plugin" value="wpforms-lite">
          <label for="Plugin"> wpforms-lite (Drag & Drop Contact Form)</label><br>
          <input type="checkbox" id="all-in-one-wp-migration" name="Plugin" value="all-in-one-wp-migration">
          <label for="Plugin"> all-in-one wp migration</label><br>
          <input type="checkbox" id="google-analytics-for-wordpress" name="Plugin" value="google-analytics-for-wordpress">
          <label for="Plugin"> google analytics for wordpress</label><br>
          <input type="checkbox" id="wp-smushit" name="Plugin" value="wp-smushit">
          <label for="Plugin"> wp smushit</label><br>
          <input type="checkbox" id="duplicator" name="Plugin" value="duplicator">
          <label for="Plugin"> duplicator</label><br>
          <input type="checkbox" id="litespeed-cache" name="Plugin" value="litespeed-cache">
          <label for="Plugin"> litespeed cache</label><br>
          <input type="checkbox" id="weglot" name="Plugin" value="weglot">
          <label for="Plugin"> Weglot Translate</label><br><br>
          </fieldset>
      </div>
      <div class="form-group col-sm-2">

      </div>
  </div>

 
  

 
<!-- Nom Admin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_admin', 'Nom Admin:') !!}
    {!! Form::text('nom_admin', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="container">
 
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
              <p style="color:red">veuillez patienter quelques minutes votre site web est en cours de generation</p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
              <div class="modal-body">
               
                <div class="d-flex align-items-center">
                  <strong>Chargement...</strong>
                  <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                </div>
                
             </div>
             
            </div>
            
          </div>
        </div>
        
      </div>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    
    

    <script>
      $(document).ready(function() 
      {
        $('form').submit(function() 
        {
            $('#myModal').modal();
        }); 
  
   
      });
  
     </script>
       
          

       
      
     
    <a href="{!! route('configs.index') !!}" class="btn btn-default">Cancel</a>
</div>
