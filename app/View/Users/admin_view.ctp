<!-- app/View/Users/admin_view.ctp -->
<div class="clearfix columns">
<table class="datatable">

<tbody>
    <tr><th>Nome: </th> <td><?php echo $User['User']['nome'] . " " . $User['User']['sobrenome']?></td></tr>
    <tr><th>Email: </th> <td><?php echo $User['User']['email']?></td></tr>
    <tr><th>Tipo Diabetes: </th> <td><?php echo $User['User']['tipo_diabetes']?></td></tr>
    <tr><th>Tipo Diabetes: </th> <td><?php echo $User['User']['tipo_diabetes']?></td></tr>
    <tr><th>Tipo Diabetes: </th> <td><?php echo $User['User']['insulinoterapia']?></td></tr>
    <tr><th>Semestre/Ano: </th> <td><?php echo $User['User']['semestre'] . " / " . $User['User']['ano']?></td></tr>

</tbody>
</table>
</div>


