<script type="text/javascript">
    $(document).ready(function(){
        var intId = 0;
        $("#text-inp").focus(function(){
            intId = setInterval(function() {
                   $(".drag-text").html($("#text-inp").val());
               }, 10);
        });

        $("#text-inp").blur(function(){
           clearInterval(intId);
        });      

        $(".drag-text").draggable({
            containment: 'tbldevs_in'
        }); 
       //Counter
        counter = 0;
        //Make element draggable
        $(".drag").draggable({
            helper:'clone',
            containment: 'tbldevs_in',

            //When first dragged
            stop:function(ev, ui) {
            	var pos=$(ui.helper).offset();
            	objName = "#clonediv"+counter
                var pos_p = $('#tbldevs_in').offset();
            	$(objName).css({"margin-left":pos.left-pos_p.left,"margin-top":pos.top-pos_p.top});
            	$(objName).removeClass("drag");
                 counter++;

               	//When an existiung object is dragged
                $(objName).draggable({
                	containment: 'parent',
                        stop:function(ev, ui) {
                    	var pos=$(ui.helper).offset();
                        var pos_p = $('#tbldevs_in').offset();
                        $(objName).css({"margin-left":pos.left-pos_p.left,"margin-top":pos.top-pos_p.top
                                        ,"top":'',"left":''});
                        $(objName)
                        var e = 0;
                    	//console.log($(this).attr("id"));
						//console.log(pos.left)
                        //console.log(pos.top)
                    }
                });
            }

            
        });
   
        
        //Make element droppable
        $("#tbldevs_in").droppable({
			drop: function(ev, ui) {
				if (ui.helper.attr('id').search(/drag[0-9]/) != -1){
					//counter++;
					var element=$(ui.draggable).clone();
					element.addClass("tempclass");
					$(this).append(element);
					$(".tempclass").attr("id","clonediv"+counter);
					$("#clonediv"+counter).removeClass("tempclass");

					//Get the dynamically item id
					draggedNumber = ui.helper.attr('id').search(/drag([0-9])/)
					itemDragged = "dragged" + RegExp.$1
					//console.log(itemDragged)

					$("#clonediv"+counter).addClass(itemDragged);
				} 
        	}
        });

        $(".ui-draggable").live("dblclick",function(){
            $("#"+this.id).remove();
        }); 
    });

</script>