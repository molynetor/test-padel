<div class="modal fade" id="exampleModal{{$pista->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información de la Pista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <p><img src="{{asset('images')}}/{{$pista->image}}" class="table-pista-thumb" alt="" width="200"></p>
                    <p>Nombre:{{$pista->name}}</p>
                    <p>Tipo:{{$pista->type}}</p>
             
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                  
                  </div>
                </div>
              </div>
            </div>
 