@extends('dashboard_master')

@section('page_title')
InfobizSoft-ERP
@endsection

@section('page_style')
<link rel="stylesheet" type="text/css" href="{{asset('dashboard/files/assets/css/style.css')}}">
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('dashboard_content')
<div class="pcoded-content">
	<div class="pcoded-inner-content">

		<div class="main-body">
			<div class="page-wrapper">
				<div class="heading" style="height:25px; color: black; font-size: 35px; font-weight: bold;">
					Leave Management
				</div>
				<br><br>
				<span class="counter pull-right"></span>
				<div class="caption" style="padding-top: 15px; padding-bottom: 15px; background-color: 	#202020; font-size: 18px; color:white;">
					<i class="fa fa-cogs" style="padding-top: 8px; padding-bottom: 8px; padding-left: 5px"></i> Manage Leave Request Type
				</div>

				<form name="add_name" id="add_name">  


					<div class="alert alert-danger print-error-msg" style="display:none">
						<ul></ul>
					</div>


					<div class="alert alert-success print-success-msg" style="display:none">
						<ul></ul>
					</div>


					<div class="table-responsive">  
						<table class="table table-bordered" id="dynamic_field">  
							<tr>  
								<td><input type="text" name="name[]" placeholder="Enter Leave Type" class="form-control name_list" /></td>  
								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
							</tr>  
						</table>  
						<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
					</div>


				</form>  

			</div>
		</div>
	</div>
</div>

@endsection

@section('page_js')

<script type="text/javascript">

	$(document).ready(function() {
		$(".search").keyup(function () {
			var searchTerm = $(".search").val();
			var listItem = $('.results tbody').children('tr');
			var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

			$.extend($.expr[':'], {'containsi': function(elem, i, match, array){
				return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
			}
		});

			$(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
				$(this).attr('visible','false');
			});

			$(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
				$(this).attr('visible','true');
			});

			var jobCount = $('.results tbody tr[visible="true"]').length;
			$('.counter').text(jobCount + ' item');

			if(jobCount == '0') {$('.no-result').show();}
			else {$('.no-result').hide();}
		});
	});

</script>

<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('/leave_management/leave_type'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>
	@endsection