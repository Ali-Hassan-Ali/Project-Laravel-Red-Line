
<section class="map bg-dark col-12">

    <div class="row my-0 py-0">
        
        <div class="col-12 col-md-6">
            <iframe src="{{ setting('map_one') }}" width="100%" height="500" style="border:0;" loading="lazy"></iframe>            
        </div>

        <div class="col-12 col-md-6">
            <iframe src="{{ setting('map_tow') }}" width="100%" height="500" style="border:0;" loading="lazy"></iframe>    
        </div>

    </div>

</section>

<footer id="social">
    <div class="container d-flex justify-content-around col-7 col-md-2 wow bounceInUp" data-wow-duration="3s" data-wow-offset="0">
        <a class="p-2 bordering d-flex align-items-center justify-content-center wow hvr-push" href="{{ setting('facebook') }}">
            <i class="fa fa-facebook fa-1x d-flex align-items-center justify-content-center">
            </i>
        </a>
        <a class="p-2 text-danger bordering d-flex align-items-center justify-content-center hvr-push" href="{{ setting('whatsapp') }}">
            <i class="fa fa-whatsapp fa-1x d-flex align-items-center justify-content-center">
            </i>
        </a>
        <a class="p-2 bordering d-flex align-items-center justify-content-center hvr-push" href="{{ setting('twitter') }}">
            <i class="fa fa-twitter fa-1x">
            </i>
        </a>
        <a class="p-2 text-danger bordering d-flex align-items-center justify-content-center hvr-push" href="{{ setting('instagram') }}">
            <i class="fa fa-instagram fa-1x">
            </i>
        </a>
    </div>
</footer>