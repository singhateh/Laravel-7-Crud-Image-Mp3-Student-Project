<script>
    $(document).ready(function() {
		
        $('ul a').click(function() {
        var $anchor = $(this);
        
        $('html, body').animate({
        scrollTop: $($anchor.attr('href')).offset().top
        }, 2000);
        return false;
        helpers : {
        }
        });
        });
</script>