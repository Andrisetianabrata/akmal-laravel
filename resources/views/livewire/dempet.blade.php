<div>
    {{-- @dd(request()->routeIs('keluar-masuk') ? 'true' : 'false') --}}
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Dempet Depan / Dempet Belakang</h1>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Dempet Samping</th>
                <th>Dempet Belakang</th>
              </tr>
            </thead>
            {{-- <tfoot>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Dempet Samping</th>
                <th>Dempet Belakang</th>
              </tr>
            </tfoot> --}}
            <tbody>
                @foreach ($allData as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->tanggal}}</td>
                  <td>{{$data->waktu}}</td>
                  <td>{{$data->dempet_samping}}</td>
                  <td>{{$data->dempet_depan}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{-- {{$allData->links()}} --}}
    <script>
      jQuery(document).ready(function () {
        var table = jQuery('#dataTable').DataTable({
          order: [[0, 'desc']],
          layout: {
            bottomStart: {
              buttons: ['csv', 'excel', 'print']
            }
          }
        });

        var pusher = new Pusher('2909005fca7afe4ed6a7', {
          cluster: 'ap1'
        });

        var channel = pusher.subscribe('channel');
        channel.bind('dempetEvent', function(data) {
          console.log(JSON.stringify(data));
          
          table.destroy();
          var json = JSON.stringify(data);
          var jsonData = JSON.parse(json);
          var id = jsonData.data.id;
          var tanggal = jsonData.data.tanggal;
          var waktu = jsonData.data.waktu;
          var dempet_samping = jsonData.data.dempet_samping;
          var dempet_depan = jsonData.data.dempet_depan;

          var tbody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
          var newRow = tbody.insertRow(0);
          var cell1 = newRow.insertCell(0);
          var cell2 = newRow.insertCell(1);
          var cell3 = newRow.insertCell(2);
          var cell4 = newRow.insertCell(3);
          var cell5 = newRow.insertCell(4);

          cell1.innerHTML = id;
          cell2.innerHTML = tanggal;
          cell3.innerHTML = waktu;
          cell4.innerHTML = dempet_samping;
          cell5.innerHTML = dempet_depan;
        
          table = jQuery('#dataTable').DataTable({
            order: [[0, 'desc']],
            layout: {
              bottomStart: {
                buttons: ['csv', 'excel', 'print']
              }
            }
          });
        });
      });
    </script>
</div>
