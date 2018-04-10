<?php
	echo "<form method=post name=f1 action=''>";

echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
	foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['cat_id']==@$cat){echo "<option selected value='$noticia2[cat_id]'>$noticia2[category]</option>"."<BR>";}
else{echo "<option value='$noticia2[cat_id]'>$noticia2[category]</option>";}
}
echo "</select>";


echo "<select name='subcat'><option value=''>Select one</option>";
foreach ($dbo->query($quer) as $noticia) { {
echo "<option value='$noticia[subcategory]'>$noticia[subcategory]</option>";
}
echo "</select>";
 
echo "<input type=submit value=Submit>";
echo "</form>";

?>