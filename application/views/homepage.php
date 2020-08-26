<h1>Currency Converter</h1>



<form action="/Main/currency" method="POST">
	<label for="value">Input value</label>
	<input type="number" name="value" id="value" value="<?=$_POST['value']?>">

	<label for="from_currency">From what currency</label>
	<select name="from_currency" id="from_currency">
		<?if(isset($_POST['from_currency'])):?>
			<option value="<?=$_POST['from_currency']?>">
				<?=strtoupper($_POST['from_currency'])?> - current
			</option>
		<?endif?>
		<?foreach($data['currencies'] as $currency):?>
			<?if($currency['is_visible'] == true):?>
			<option value="<?=$currency['currency_name']?>">
					<?=$currency['currency_name']?>
			</option>
			<?endif?>
		<?endforeach?>		
	</select>

	<label for="to_currency">To what currency</label>
	<select name="to_currency" id="to_currency">
		<?if(isset($_POST['to_currency'])):?>
			<option value="<?=$_POST['to_currency']?>">
				<?=strtoupper($_POST['to_currency'])?> - current
			</option>
		<?endif?>
		<?foreach($data['currencies'] as $currency):?>
			<?if($currency['is_visible'] == true):?>
			<option value="<?=$currency['currency_name']?>">
					<?=$currency['currency_name']?>
			</option>
			<?endif?>
		<?endforeach?>
	</select>
	<br>
	<button type="submit" class="btn btn-dark">Convert</button>
	
</form>
<?if(isset($_POST['final_curr'])):?>
<div class="rounded-pill bg-info text-white"  style="height: 65px;width: 150px;margin-left:45%;">
<h4 class="text-center" >Exchanged:  <?=$_POST['final_curr']?></h4>
<?endif?>
</div>