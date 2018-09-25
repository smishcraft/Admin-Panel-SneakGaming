document.addEventListener("DOMContentLoaded",function(event){
  jQuery('button[data-target="#largeModal"]').click(function(event) {
    jQuery.ajax({    //create an ajax request to display.php
      type: "GET",
      data: {
        plate: jQuery(this).data('plate')
      } ,
      url: "/admin/actions/getcarinventory.php",
      dataType: "html",   //expect html to be returned
      success: function(response){

          jQuery("#largeModal .modal-title").html('Inventory');
          jQuery("#largeModal .modal-body p").html(response);
      }
    });

    jQuery('#bootstrap-data-table-export').DataTable();

    jQuery(document).on("click", "button", function(e) {
      console.log('running');
      jQuery(".modal-body p").empty();
      e.preventDefault;
      e.stopPropagation();
    });

  });

  // Kick Player
  jQuery(document).on("click", "span.kick",function(e) {
    e.preventDefault;
    var reasonInput = prompt("Reason", "Kicked by the server");
    if (reasonInput !== null && reasonInput !== "") {
      var steamidSaved = jQuery(this).data('steamid')
      jQuery.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {
          steamid: jQuery(this).data('steamid'),
          reason: reasonInput,
          csrfToken: jQuery(this).data('csrf')
        } ,
        url: "/admin/actions/addKick.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
            jQuery('span.kick[data-steamid="'+steamidSaved+'"]').hide(300);
        }
      }); // end ajax
    }else{
      e.preventDefault;
    } // end confirm
  });

  // Ban player
  jQuery(document).on("click", "span.ban",function(event) {
    event.preventDefault;
    var reasonInput = prompt("Perma ban Reason: ", "");
    if (reasonInput !== null && reasonInput !== "") {
      var steamidSaved = jQuery(this).data('steamid');
      jQuery.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {
          steamid: jQuery(this).data('steamid'),
          bannedby: jQuery('.current_loggedin_user').val(),
          license: jQuery(this).data('license'),
          username: jQuery(this).data('username'),
          reason: reasonInput,
          csrfToken: jQuery(this).data('csrf')
        } ,
        url: "/admin/actions/addBan.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
            jQuery('span.ban[data-steamid="'+steamidSaved+'"]').hide(300);
        }
      }); // end ajax
    } // end confirm
  });

  // ban user-view
  jQuery(document).on("click", "span.banuser",function(e) {
    e.preventDefault;
    jQuery('.ban-player').addClass('show');
    jQuery('html,body').animate({
        scrollTop: jQuery(".ban-player").offset().top
    }, 'slow');
  });

  //cancelban
  jQuery(document).on("click", "span.cancelban",function(e) {
    e.preventDefault;
    jQuery('.ban-player').removeClass('show');
  });

  //delete car
  jQuery(document).on("click", "a.delcar",function(e) {
    e.preventDefault;
    if (confirm('Are you sure to delete car?')) {
      var carPlate = jQuery(this).data('plate');
      jQuery.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {
          steamid: jQuery(this).data('steamid'),
          plate: jQuery(this).data('plate'),
          csrfToken: jQuery(this).data('csrf')
        } ,
        url: "/admin/actions/deleteCar.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
            jQuery('a.delcar[data-plate="'+carPlate+'"]').parent().parent().hide(300);
        }
      }); // end ajax
    } // end confirm
  });

  //remove item
  jQuery(document).on("click", "a.remove-item",function(event) {
    event.preventDefault;
    if (confirm('Are you sure to delete item?')) {
      var itemID = jQuery(this).data('itemid');
      jQuery.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {
          itemid: itemID,
          csrfToken: jQuery(this).data('csrf')
        } ,
        url: "/admin/actions/removeItem.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
            jQuery('a.remove-item[data-itemid="'+itemID+'"]').parent().parent().hide(300);
        }
      }); // end ajax
    } // end confirm
  });

  // Remove report
  jQuery(document).on("click", "span.delete",function(e) {
    if (confirm('Are you sure to delete this report?')) {
      var reportID = jQuery(this).data('id');
      jQuery.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {
          reportId: jQuery(this).data('id'),
          action : jQuery(this).data('action'),
          csrfToken: jQuery(this).data('csrf')
        } ,
        url: "/admin/actions/removeReport.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
            jQuery('span.delete[data-id="'+reportID+'"]').parent().parent().hide(300);
        }
      }); // end ajax
    }else{
    } // end confirm
      e.stopPropagation();
      e.preventDefault;
  });

  //delete weapon
  jQuery(document).on("click", "li.delweapon",function(e) {
    e.preventDefault;
    if (confirm('Are you sure to delete weapon?')) {
      var weaponid = jQuery(this).data('weaponid');
      jQuery.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {
          steamid: jQuery(this).data('userid'),
          weaponid: jQuery(this).data('weaponid'),
          csrfToken: jQuery(this).data('csrf')
        } ,
        url: "/admin/actions/removeWeapon.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
            jQuery('li.delweapon[data-weaponid="'+weaponid+'"]').hide(300);
        }
      }); // end ajax
    } // end confirm
  });

  jQuery(document).on("click", "div.user-value.offline", function(e){
    jQuery(jQuery('.current-value.'+ jQuery(this).data('action'))).hide();
    jQuery('.update-input.' + jQuery(this).data('action') ).show();
  });
});
