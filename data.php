<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Data Table</title>
  <link rel="stylesheet" href="Bornestyle/styledata.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#">Listes des demandes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
   
  </div>
</nav>
<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-md-4">
    <div class="container mt-5">
    <canvas id="etatChart" width="400" height="400"></canvas>
</div>
    </div>

<br>
<br>

<div class="col-md-8">
   <div class="container mt-5">

   <br>
   <button class="btn btn-success"  onclick="exportToExcel()">EXCEL             <img src="Images/excel.png" alt="Icon" width="25" height="25">
</button>
  <br>
  <br>

  <input type="text" id="searchInput" class="form-control" placeholder="🔍 Rechercher par Pièce, Nom, etc...">

  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable">
      <thead>
      <tr>
        <th class="sortable-header" onclick="sortTable('id_demande')">
          <div>
            ID
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('date_demande')">
          <div>
            Date
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('type_demande')">
          <div>
            Pièce
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('demandee_par')">
          <div>
            Nom
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('matricule')">
          <div>
            Matricule
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('annee_fiche')">
          <div>
            Année
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('mois_fiche')">
          <div>
            Mois
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('etat_demande')">
          <div>
            État
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('etat_demande')">
          <div>
            Source
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('etat_demande')">
          <div>
          Traitée le
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('etat_demande')">
          <div>
          Traitée par
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th class="sortable-header" onclick="sortTable('etat_demande')">
          <div>
          Notifié par
            <img src="Images/sort.png" alt="Icon" width="25" height="25">
          </div>
        </th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      <?php
      $servername = "192.168.100.15";
      $username = "borne-user";
      $password = "PT6cACXrBicY/I-n";
      $dbname = "cbs-intranet";
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM `cbs-demandes` ORDER BY `date_demande` DESC";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$row['id_demande']}</td>";
          echo "<td>{$row['date_demande']}</td>";
          echo "<td>{$row['type_demande']}</td>";
          echo "<td>{$row['demandee_par']}</td>";
          echo "<td>{$row['matricule']}</td>";
          echo "<td>{$row['annee_fiche']}</td>";
          echo "<td>{$row['mois_fiche']}</td>";
          echo "<td>{$row['etat_demande']}</td>";
          echo "<td>{$row['source_demande']}<img src='Images/Borne.png' alt='Icon' width='50' height='50'></td>";
          echo "<td>{$row['traitee_le']}</td>";
          echo "<td>{$row['traitee_par']}</td>";
          echo "<td>{$row['notifiee_par']}</td>";
          echo "<td>";
          if ($row['etat_demande'] === 'En cours de traitement') {
            echo "<button class='btn btn-primary' onclick='confirmUpdateStatus({$row['id_demande']})'>Prête</button>";
          } else {
            echo "<button class='btn btn-danger' disabled>OK</button>";
          }
          echo "</td>";
          echo "</tr>";
        }
      }
      $conn->close();
      ?>
      </tbody>
    </table>

    </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#searchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#dataTable tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

  function exportToExcel() {
    const table = document.getElementById("dataTable");
    const rows = table.querySelectorAll("tbody tr");

    let data = "<html><head><style>";
    data += "table { border-collapse: collapse; width: 100%; }";
    data += "th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }";
    data += "tr:nth-child(even) { background-color: #f2f2f2; }";
    data += "</style></head><body><table><thead><tr>";

    table.querySelectorAll("thead th").forEach((th) => {
      data += `<th>${th.innerText}</th>`;
    });

    data += "</tr></thead><tbody>";

    rows.forEach((row) => {
      data += "<tr>";
      row.querySelectorAll("td").forEach((cell) => {
        data += `<td>${cell.innerText}</td>`;
      });
      data += "</tr>";
    });

    data += "</tbody></table></body></html>";

    const blob = new Blob([data], { type: "application/vnd.ms-excel" });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = "table_data.xls";

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }

  var ctx = document.getElementById('etatChart').getContext('2d');

var etatValues = Array.from(document.querySelectorAll('#dataTable tbody tr td:nth-child(8)')).map(td => td.textContent.trim());

var etatCounts = {};
etatValues.forEach(function(etat) {
  etatCounts[etat] = (etatCounts[etat] || 0) + 1;
});

var chartData = {
  labels: Object.keys(etatCounts),
  datasets: [{
    data: Object.values(etatCounts),
    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
  }],
};

var etatChart = new Chart(ctx, {
  type: 'doughnut',
  data: chartData,
});
</script>


</body>
</html>
