
<h1 class="text-center">Settings</h1>
<h4>What currency to show?</h4>
<form method="post" action="/Main/Store">
<?foreach($data['currencies'] as $currency):?>
	<?if($currency['is_visible'] == true):?>
	<input type="checkbox" id="<?=$currency['id']?>" name="<?=$currency['currency_name']?>"
         checked>
    <?else:?>
    	<input type="checkbox" id="<?=$currency['id']?>" name="<?=$currency['currency_name']?>"
         >
    <?endif?>
  <label for="<?=$currency['currency_name']?>"><?=$currency['currency_name']?></label>
<?endforeach?>
<br>
<button class="btn btn-dark" type="submit">Save</button>
</form>
