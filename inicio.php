<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Inventario Inicial</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .table-container {
      width: 100%;
      overflow-x: auto;
      margin-top: 20px;
    }

    table {
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #f9f9f9;
      font-weight: bold;
    }

    .search-container {
      position: sticky;
      top: 0;
      z-index: 1;
      background-color: #fff;
      padding: 10px;
      margin-bottom: 20px;
    }

    .search-container input[type=text] {
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
      width: 300px;
      box-sizing: border-box;
      font-size: 14px;
    }

    .button-container {
      text-align: center;
      margin-bottom: 20px;
    }

    .button-container button {
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      background-color: #4CAF50;
      color: #fff;
      font-size: 14px;
      cursor: pointer;
      margin-right: 8px;
    }
  </style>
</head>
<body>
  <h1>Tabla de Inventario Inicial</h1>

  <div class="search-container">
    <input type="text" id="searchInput" placeholder="Buscar por Clave, Descripción, Clave alterna o Línea">
  </div>

  <div class="table-container">
    <table id="inventarioTable">
      <tr>
        <th>ClaveID</th>
        <th>Descripción</th>
        <th>Línea</th>
        <th>Existencias</th>
        <th>Unidad de entrada</th>
        <th>Factor entre unidades</th>
        <th>Clave SAT</th>
        <th>Clave unidad</th>
        <th>Código del proveedor</th>
        <th>Proveedor</th>
        <th>Clave alterna</th>
        <th>PARA REVISION</th>
        <th>PARA REESTRUCTURA</th>
      </tr>
      <!-- Aquí se agregarán las filas con JavaScript -->
    </table>
  </div>

  <div class="button-container">
    <button id="searchButton">Buscar</button>
    <button id="saveButton">Guardar</button>
  </div>

  <script>
    // Obtener la referencia a la tabla y al campo de búsqueda
    const table = document.getElementById("inventarioTable");
    const searchInput = document.getElementById("searchInput");
    const searchButton = document.getElementById("searchButton");
    const saveButton = document.getElementById("saveButton");

    // Obtener los datos de la base de datos o utilizar datos de ejemplo
    const inventarioData = [
      // Aquí puedes agregar los datos obtenidos de la base de datos
      // Por ejemplo: ["Clave1", "Descripción1", "Línea1", ...],
      //             ["Clave2", "Descripción2", "Línea2", ...],
      "clave1","descripcion","linea"
    ];

    // Agregar filas a la tabla
    function populateTable(data) {
      table.innerHTML = "";

      data.forEach(rowData => {
        const row = document.createElement("tr");
        rowData.forEach(cellData => {
          const cell = document.createElement("td");
          cell.textContent = cellData;
          row.appendChild(cell);
        });
        table.appendChild(row);
      });
    }

    // Filtrar la tabla en base al valor de búsqueda
    function filterTable() {
      const searchTerm = searchInput.value.toLowerCase();

      const filteredData = inventarioData.filter(rowData => {
        return (
          rowData[0].toLowerCase().includes(searchTerm) || // ClaveID
          rowData[1].toLowerCase().includes(searchTerm) || // Descripción
          rowData[10].toLowerCase().includes(searchTerm) || // Clave alterna
          rowData[2].toLowerCase().includes(searchTerm) // Línea
        );
      });

      populateTable(filteredData);
    }

    // Guardar los cambios en la tabla
    function saveChanges() {
      // Aquí puedes implementar la lógica para guardar los cambios en la base de datos
      alert("Los cambios se han guardado correctamente.");
    }

    // Asignar los eventos a los botones
    searchButton.addEventListener("click", filterTable);
    saveButton.addEventListener("click", saveChanges);

    // Inicializar la tabla con todos los datos
    populateTable(inventarioData);
  </script>
</body>
</html>
