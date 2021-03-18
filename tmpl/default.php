<?php
// No direct access
defined('_JEXEC') or die;
JHtml::stylesheet($root.'/modules/mod_zcalendar/css/styl.css')    ;
?>
<form method="post">
<fieldset>
	<legend>Filtruj akce</legend>		
			<select name="rocnik_filtr">
			<optgroup label=" Ročník ">
			<option value="">---- vše -----</option>
<?php	foreach($filtrrocnik as $row){ 
		$rok = new JDate($row->datum);?>
		<option><?=  $rok->format('Y') ?></option>
				<?php	} ?>
			</optgroup>
			</select>

			<select id="typ_akce_filtr" name="typ_akce_filtr">
			<optgroup label=" Druh akce ">
			<option value="">---- vše -----</option>
<?php	foreach($filtrtyp as $row){ ?>
			<option value= <?= $row->typ_zavodu ?>><?=$row->nazev_typu ?></option>
				<?php	} ?>
			</optgroup>
			</select>			
			<input type="submit" name="filtruj" type="submit" class="tlacitko" value="filtruj" >
			<input type="submit" name="smaz_filtr" type="submit" class="mazaci_tlacitko" value="smaž filtr" >
</fieldset>	
</form>
	<table>
			<tr>
				<th>Nazev</th>
				<th>Datum</th>
				<th>Druh akce</th>
				<th>odkaz</th>
			</tr>
<?php foreach($akcevypis as $row){ 
			 $datum_dmr = new JDate($row->datum);?>
			<tr>
				<td><?= $row->nazev ?></td>
				<td><?= $datum_dmr ->format('d-m-Y') ?></td> 
				<td><?= $row->nazev_typu ?></td>
				<td><?= $row->akce_odkaz ?></td>
			</tr> 
<?php } ?>
	</table>
