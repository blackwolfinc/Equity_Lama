(function ($) {
  
  $(document).ready(function(){
    

    
    $('#nav > li > a.active').attr('id', 'current');
    $('ul#nav > li.active-trail.sf-depth-1 > a').attr('id', 'current');
    


    $('.tooltips').tooltip({
      selector: "a[rel=tooltip]"
    })

    
  });
  
})(jQuery);