<div class="row">
      <div class="col-12">
        <b>Tanggal : <?= $tgl ?> </b>
      <table class="table table-bordered">
<tr class="text-center">
    <th>No</th>
    <th>Nama Menu</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Total</th>
</tr>
<?php $no = 1;
foreach ($dataharian as $key => $value) {
    $grandtotal[] = $value['total'];
    ?> 
<tr>
    <td><?= $no++ ?></td>
    <td><?= $value['nama_menu'] ?></td>
    <td><?= number_format($value['harga'], 0) ?>.-</td>
    <td><?= $value['qty'] ?></td>
    <td>Rp. <?= number_format($value['total'], 0) ?>.-</td>
</tr>
<?php } ?> 
<tr>
    <td class="text-center  text-dark" colspan="4"><b>Grand Total</b></td>
    <td class="text-right">
       Rp. <?= $dataharian == null ? "" : number_format(array_sum($grandtotal), 0) ?>.-
    </td>
</tr>
</table>
      </div>
</div>
