(function($){


    $('.delete-btn').click(function(){
        let conf = confirm('Are you sure ? ');

        if(conf){
            return true;
        }else {
            return false;
        }

    });


})(jQuery)