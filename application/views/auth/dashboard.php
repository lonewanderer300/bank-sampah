<h2>Dashboard</h2>

<h3>Histogram Uang Terkumpul per Bulan</h3>
<canvas id="histogram"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('histogram').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php foreach($histogram as $h) echo "'".$h->bulan."',"; ?>],
        datasets: [{
            label: 'Total Uang',
            data: [<?php foreach($histogram as $h) echo $h->total.","; ?>],
            backgroundColor: 'rgba(75, 192, 192, 0.6)'
        }]
    }
});
</script>

<h2>Kategori Sampah Saya</h2>
<table class="table">
    <thead>
        <tr>
            <th>Kategori Sampah</th>
            <th>Total Jumlah Sampah</th>
            <th>Bank Sampah</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($kategori_sampah)): ?>
            <?php foreach($kategori_sampah as $s): ?>
                <tr>
                    <td><?= $s->kategori_sampah ?></td>
                    <td><?= $s->total ?></td>
                    <td><?= $s->nama_bank_sampah ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="3">Belum ada data sampah</td></tr>
        <?php endif; ?>
    </tbody>
</table>


