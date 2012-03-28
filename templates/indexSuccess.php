<?php
// auto-generated by sfPropelAdmin
// date: 2011/09/21 10:58:02
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php use_javascript('jquery-1.4.2.min.js'); ?>

<div id="sf_admin_container">

<h1><?php echo __('allegro',
array()) ?></h1>

<div id="sf_admin_header">
    
</div>

<table class="filter_and_table_container">
<tbody>
<tr>
<td id="td_sf_admin_bar" class="allegro">

<div id="sf_admin_bar" class="allegro">
<ul>
<!--    <li><?php echo link_to('Cats list', 'allegro/view?method=GetCatsData') ?></li>
    <li><?php echo link_to('Cats list', 'allegro/listCats') ?></li>
    <li><?php echo link_to('My Account', 'allegro/myAccount') ?></li>
    <li><?php echo link_to('My Account', 'allegro/doGetSellFormFieldsExt') ?></li>-->
    <?php foreach ($class_methods as $method_name): ?>
	<?php //var_dump(preg_match('/get|show|send|add/i', $method_name)) ?>
	<li><?php echo link_to_function($method_name, 'ajaxLoadView("'.$method_name.'")') ?></li>
    <?php endforeach; ?>
</ul>
</div>

</td>
<td id="td_sf_admin_content">

<div id="sf_admin_content">
content
</div>

</td>
</tr>
</tbody>
</table>

<div id="sf_admin_footer">

</div>

</div>
<script type="text/javascript">
    jQuery.expr[':'].regex = function(elem, index, match) {
	var matchParams = match[3].split(','),
	    validLabels = /^(data|css):/,
	    attr = {
		method: matchParams[0].match(validLabels) ? 
			    matchParams[0].split(':')[0] : 'attr',
		property: matchParams.shift().replace(validLabels,'')
	    },
	    regexFlags = 'ig',
	    regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
	return regex.test(jQuery(elem)[attr.method](attr.property));
    }
    
    function ajaxLoadView(method) {
	jQuery.ajax({
		url:"allegro/view",
		data: {method: method},
		type:"POST",
		dataType:"json",
		success:function(result){
		jQuery('#sf_admin_content').html(result.html);
	}});
    }
    
    function ajaxSendParams() {
	//alert(jQuery('#method_name').val());
	var method = jQuery('#method_name').val();
	postData = new Object;
	jQuery('input:regex(name,options)').each(function() {
	    var value = this.value;
	    postData[this.id] = value;
	});
	jQuery.ajax({
		url: "allegro/populate",
		data: {method: method, options: postData},
		type: "POST",
		dataType:"json",
		success: function(result){ jQuery('#sf_admin_content').html(result.html); },
		error: function(x, t, m) {
		    if(t==="timeout") {
			alert("got timeout");
		    } else {
			alert(t);
		    }
		}});
    }
</script>