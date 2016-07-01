$(document).ready(function(){
	$(".behlp").click(function(){$("#fehlpPane").hide(500); $("#moreinfoPane").hide(500); $("#behlpPane").toggle(500); return false;});
	
	$(".fehlp").click(function(){$("#behlpPane").hide(500); $("#moreinfoPane").hide(500); $("#fehlpPane").toggle(500); return false;});
	
	$(".moreinfo").click(function(){$("#behlpPane").hide(500); $("#fehlpPane").hide(500); $("#moreinfoPane").toggle(500); return false;});
	
	$(".closebtn").click(function(){$("#behlpPane").hide(500); $("#fehlpPane").hide(500); $("#moreinfoPane").hide(500); return false;});
	
	$(".addprodlnk").click(function(){$("#dbInfoDiv").hide(500); $(this).hide(500); $(".showdbinfo").hide(500); $(".maincontainer").slideUp(500); $("#addProdDiv").toggle(500); $(".cancaddprodbtn").show(500); return false;});
	
	$(".editprodlnk").click(function(){$(this).hide(500); $("#editProdDiv").toggle(500); $(".canceditprodbtn").show(500); return false;});
	
	$(".cancaddprodbtn").click(function(){$(this).hide(500); $(".addprodlnk").show(500); $(".showdbinfo").show(500); $("#addProdDiv").toggle(500); $(".maincontainer").slideDown(500); return false;});
	
	$(".canceditprodbtn").click(function(){$(this).hide(500); $("#editProdDiv").toggle(500); return false;});
	
	$(".showdbinfo").click(function(){$("#addProdDiv").hide(500); $("#dbInfoDiv").toggle(500); return false;});

	function getCats(){
		$(".prodPane").slideUp(500,function(){
		$.post('getcats.php',{},
			function(output){
				$(".prodPane").html("<h3>Categories</h3>"+output);
			});
				$(".prodPane");
		}).slideDown(500);
		return false;
	}
	
	$(document).on("click", '.getsubcatlnk,.breadcrumb', function() {
		var cat = $(this).attr('name');
		$(".prodPane").slideUp(500,function(){
		$.post('getsub.php',{cat:cat},
			function(output){
				$(".prodPane").html("<h3>Category: "+cat+"</h3><h4>Select subcategory:</h4>"+output);
			});
				$(".prodPane").slideDown(500);
				$(".backbtn").show(500);
		});
		return false;
	});
	
	$(document).on("click", '.getprodslnk', function() {
		var sub = $(this).attr('name');
		var cat = $(this).attr('title');
			$(".prodPane").slideUp(500,function(){
			$.post('getprods.php',{sub:sub, cat:cat},
				function(output){
					$(".prodPane").html("<a href='#' class='breadcrumb' name='"+cat+"'><h3>"+cat+"</h3></a><h3> -> "+sub+" items</h3><br />"+output);
				});
					$(".prodPane").slideDown(500);
			});
		return false;
	});
	
	$(document).on("click", '.backbtn', function() {
		$(this).hide(200);
		getCats();
		return false;
	});
	
	$(document).on("click", '#addProdBtn', function() {
		var addcat = $("#addProdCatip").val();
		var addsub = $("#addProdSubip").val();
		var addpartno = $("#addProdPartnoip").val();
		var adddesc = $("#addProdDescip").val();
		if(addcat==""||addsub==""||addpartno==""||adddesc==""){alert ("Please fill in all fields"); return false;} else {
		$("#addProdDiv").slideUp(500,function(){
			$.post('dbcrud.php',{addcat:addcat,addsub:addsub,addpartno:addpartno,adddesc:adddesc,'save':true}, //addprod.php
				function(output){
					$("#addProdDiv").html(output);
				});
			}).slideDown(500);
		}
		return false;
	});
	
	$(document).on("click", '.delitem', function() {
		var itemid = $(this).attr('name');
		$(this).closest('.itemrow').slideUp(500,function(){
			$.post('dbcrud.php',{itemid:itemid,'delete':true});
				$(this).html("<tr><td>Item deleted</td></tr>");
			}).slideDown(500);
		return false;
	});
	
	$(document).on("click", '.edititem', function() {
		var itemid = $(this).attr('name');
		$('.prodPane').slideUp(500,function(){
			$.post('updprod.php',{itemid:itemid},
				function(output){
					$('.prodPane').html(output);
				});
			}).slideDown(500);
		return false;
	});
	
	$(document).on("click", '#editProdBtn', function() {
		var itemid = $('#itemid').val();
		var cat = $('#editProdCatip').val();
		var sub = $('#editProdSubip').val();
		var partno = $('#editProdPartnoip').val();
		var desc = $('#editProdDescip').val();
		
		if(itemid==""||cat==""||sub==""||partno==""||desc==""){alert("Please fill in all fields");} else {

		$('.prodPane').slideUp(500,function(){
			$.post('dbcrud.php',{itemid:itemid,cat:cat,sub:sub,partno:partno,desc:desc,'update':true},
				function(output){
					$('.prodPane').html(output);
				});
			}).slideDown(500);
		}
		return false;
	});
	
	$(document).on("click", '.hideStats', function() {
		$("#dbInfoDiv").toggle(500);
		return false;
	});

getCats();
});