<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>
    <div style="margin: 20px;">

      <table id="example" class="display nowrap" width="100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </tfoot>

        <tbody>
          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$3,120</td>
          </tr>
          <tr>
            <td>Garrett Winters</td>
            <td>Director</td>
            <td>Edinburgh</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$5,300</td>
          </tr>
          <tr>
            <td>Ashton Cox</td>
            <td>Technical Author</td>
            <td>San Francisco</td>
            <td>66</td>
            <td>2009/01/12</td>
            <td>$4,800</td>
          </tr>
        </tbody>
      </table>
      <hr/>
      <table id="example2" class="display nowrap" width="100%" data-rowonetitle="My Sheet2" data-sheetname="Summary2">
        <thead>
          <tr>
            <th>Name</th>
            <th>Notes</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Name</th>
            <th>Notes</th>
          </tr>
        </tfoot>

        <tbody>
          <tr>
            <td>Big Column Test 1</td>
            <td>Notes 1</td>
          </tr>
          <tr>
            <td>Test 2</td>
            <td>Notes 2</td>
          </tr>
       </tbody>
      </table>
     <hr/> 
    <table id="example3" class="display nowrap" width="100%" data-rowonetitle="My Sheet3" data-sheetname="Summary3">
        <thead>
          <tr>
            <th>TABLE 3</th>
            <th>Notes</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Comments </th>
            <th>Notes</th>
          </tr>
        </tfoot>

        <tbody>
          <tr>
            <td>Test 1</td>
            <td>Notes 1</td>
          </tr>
          <tr>
            <td>Test 2</td>
            <td>Notes 2</td>
          </tr>
       </tbody>
      </table>
          <table id="example4" class="display nowrap" width="100%" data-rowonetitle="My Sheet4" data-sheetname="Summary4">
        <thead>
          <tr>
            <th>TABLE 4</th>
            <th>Notes</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Comments </th>
            <th>Notes</th>
          </tr>
        </tfoot>

        <tbody>
          <tr>
            <td>Test 1</td>
            <td>Notes 1</td>
          </tr>
          <tr>
            <td>Test 2</td>
            <td>Notes 2</td>
          </tr>
       </tbody>
      </table>
          <table id="example5" class="display nowrap" width="100%" data-rowonetitle="My Sheet5" data-sheetname="Summary5">
        <thead>
          <tr>
            <th>TABLE 5</th>
            <th>Notes</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Comments </th>
            <th>Notes</th>
          </tr>
        </tfoot>

        <tbody>
          <tr>
            <td>Test 1</td>
            <td>Notes 1</td>
          </tr>
          <tr>
            <td>Test 2</td>
            <td>Notes 2</td>
          </tr>
       </tbody>
      </table>
          <table id="example6" class="display nowrap" width="100%" data-rowonetitle="My Sheet6" data-sheetname="Summary6">
          <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </tfoot>

        <tbody>
          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$3,120</td>
          </tr>
          <tr>
            <td>Garrett Winters</td>
            <td>Director</td>
            <td>Edinburgh</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$5,300</td>
          </tr>
          <tr>
            <td>Ashton Cox</td>
            <td>Technical Author</td>
            <td>San Francisco</td>
            <td>66</td>
            <td>2009/01/12</td>
            <td>$4,800</td>
          </tr>
        </tbody>
      </table>

</div>

<script>

//
// Based on example from:
// http://live.datatables.net/kuyayeto/9/edit
// which in turn is based on example from:
// https://datatables.net/forums/discussion/49457
// modified by me to process additional tables in a loop.
//
$(document).ready( function () {
  
  function getHeaderNames(table) {
    // Gets header names.
    //params:
    //  table: table ID.
    //Returns:
    //  Array of column header names.
    
    var header = $(table).DataTable().columns().header().toArray();

    var names = [];
    header.forEach(function(th) {
     names.push($(th).html());
    });
        
    return names;
  }
  
  function buildCols(data) {
    // Builds cols XML.
    //To do: define widths for each column.
    //Params:
    //  data: row data.
    //Returns:
    //  String of XML formatted column widths.
    
    var cols = '<cols>';
    
    for (i=0; i<data.length; i++) {
      colNum = i + 1;
      cols += '<col min="' + colNum + '" max="' + colNum + '" width="20" customWidth="1"/>';
    }
    
    cols += '</cols>';
    
    return cols;
  }
  
  function buildRow(data, rowNum, styleNum) {
    // Builds row XML.
    //Params:
    //  data: Row data.
    //  rowNum: Excel row number.
    //  styleNum: style number or empty string for no style.
    //Returns:
    //  String of XML formatted row.
    
    var style = styleNum ? ' s="' + styleNum + '"' : '';
    
    var row = '<row r="' + rowNum + '">';

    for (i=0; i<data.length; i++) {
      colNum = (i + 10).toString(36).toUpperCase();  // Convert to alpha
      
      var cr = colNum + rowNum;
      
      row += '<c t="inlineStr" r="' + cr + '"' + style + '>' +
              '<is>' +
                '<t>' + data[i] + '</t>' +
              '</is>' +
            '</c>';
    }
      
    row += '</row>';
        
    return row;
  }
  
  function getTableData(table, title) {
    // Processes Datatable row data to build sheet.
    //Params:
    //  table: table ID.
    //  title: Title displayed at top of SS or empty str for no title.
    //Returns:
    //  String of XML formatted worksheet.
    
    var header = getHeaderNames(table);
    var table = $(table).DataTable();
    var rowNum = 1;
    var mergeCells = '';
    var ws = '';
    
    ws += buildCols(header);
    ws += '<sheetData>';
    
    if (title.length > 0) {
      ws += buildRow([title], rowNum, 51);
      rowNum++;
      
      mergeCol = ((header.length - 1) + 10).toString(36).toUpperCase();
      
      mergeCells = '<mergeCells count="1">'+
        '<mergeCell ref="A1:' + mergeCol + '1"/>' +
                   '</mergeCells>';
    }
                      
    ws += buildRow(header, rowNum, 2);
    rowNum++;
    
    // Loop through each row to append to sheet.    
    table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
      var data = this.data();
      
      // If data is object based, then it needs to be converted 
      // to an array before sending to buildRow()
      ws += buildRow(data, rowNum, '');
      
      rowNum++;
    } );
    
    ws += '</sheetData>' + mergeCells;
        
    return ws;

  }
  
  function setSheetName(xlsx, name) {
    // Changes tab title for sheet.
    //Params:
    //  xlsx: xlxs worksheet object.
    //  name: name for sheet.
    
    if (name.length > 0) {
      var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
      source.setAttribute('name', name);
    }
  }
  
  function addSheet(xlsx, table, title, name, sheetId) {
    //Clones sheet from Sheet1 to build new sheet.
    //Params:
    //  xlsx: xlsx object.
    //  table: table ID.
    //  title: Title for top row or blank if no title.
    //  name: Name of new sheet.
    //  sheetId: string containing sheetId for new sheet.
    //Returns:
    //  Updated sheet object.
    
    //Add sheet2 to [Content_Types].xml => <Types>
    //============================================
    var source = xlsx['[Content_Types].xml'].getElementsByTagName('Override')[1];
    var clone = source.cloneNode(true);
    clone.setAttribute('PartName','/xl/worksheets/sheet' + sheetId + '.xml');
    xlsx['[Content_Types].xml'].getElementsByTagName('Types')[0].appendChild(clone);
    
    //Add sheet relationship to xl/_rels/workbook.xml.rels => Relationships
    //=====================================================================
    var source = xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationship')[0];
    var clone = source.cloneNode(true);
    clone.setAttribute('Id','rId'+sheetId+1);
    clone.setAttribute('Target','worksheets/sheet' + sheetId + '.xml');
    xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationships')[0].appendChild(clone);
    
    //Add second sheet to xl/workbook.xml => <workbook><sheets>
    //=========================================================
    var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
    var clone = source.cloneNode(true);
    clone.setAttribute('name', name);
    clone.setAttribute('sheetId', sheetId);
    clone.setAttribute('r:id','rId'+sheetId+1);
    xlsx.xl['workbook.xml'].getElementsByTagName('sheets')[0].appendChild(clone);
    
    //Add sheet2.xml to xl/worksheets
    //===============================
    var newSheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'+
      '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac" mc:Ignorable="x14ac">'+
      getTableData(table, title) +
      
      '</worksheet>';

    xlsx.xl.worksheets['sheet' + sheetId + '.xml'] = $.parseXML(newSheet);
    
  }
  
  var table = $('#example').DataTable({
    dom: 'Bftrip',
    buttons: [
	  {
        extend: 'excelHtml5',
        text: 'Excel',
        customize: function( xlsx ) {
          setSheetName(xlsx, 'Employees');

          // process additional DataTables in the web page:
          $('table').each(function( index ) {
            if ( index > 0 ) {
              var tableID = '#' + $( this ).attr('id');
              var rowOneTitle = $( this ).attr('data-rowonetitle');
              var sheetName = $( this ).attr('data-sheetname');
              var sheetID = index + 1;
              addSheet(xlsx, tableID, rowOneTitle, sheetName, sheetID);
            }
          });
   
        }
          
      }
    ]

  });
  
  $('#example2').DataTable();  
  $('#example3').DataTable();
  $('#example4').DataTable();
  $('#example5').DataTable();
  $('#example6').DataTable();
    
} );
</script>
</body>
<footer>
    <?php include("share/footer.php"); ?>
</footer>
<script>
    $(document).ready(function() {
        $("#homepage").addClass("active");
        $("#mat_barcode").change(function() {
            getproduct();
        });
    });
</script>

</html>