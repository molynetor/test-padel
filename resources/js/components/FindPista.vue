
   
<template>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header">Buscar Pista</div>
      <div class="card-body">
        <datepicker
          class="my-datepicker"
          calendar-class="my-datepicker_calendar"
          :disabledDates="disabledDates"
          :format="customDate"
          v-model="value"
          :inline="true"
          :language="es"
          :monday-first="true"
        ></datepicker>
      </div>
    </div>

    <div class="card row mt-5">
      <div class="card-header">Pistas</div>

      <div class="card-body container">
        <div class="row">
          <div
            class="col-md-4 d-flex justify-content-center"
            v-for="(p, index) in pistas"
            :key="index"
             
          >
            <v-card
            v-if="p.horas"
              :loading="loading"
              class="mx-auto my-12 mt-5 tarjeta"
              max-width="300"
              height="600"
            >
              <template slot="progress">
                <v-progress-linear
                  color="rgb(93 64 200)"
                  height="10"
                  indeterminate
                ></v-progress-linear>
              </template>

              <v-img
                height="180"
                class="border-1"
                :src="'/images/' + p.pistas.image"
              ></v-img>

              <v-card-title class="fw-bold">{{ p.pistas.name }}</v-card-title>

              <v-divider class="mx-4 my-0"></v-divider>

              <v-card-title class="py-1"
               v-if="p.horas.length>0"
                >Franjas disponibles (90min) <br/>
               
              </v-card-title>
              <v-card-title class="py-1"
               v-else
                >No hay disponibilidad  <br/>
               
              </v-card-title>
              <div class="text-muted ms-4">
                {{ p.date | formatDate }}
              </div>
             
              <v-card-text>
                <v-chip-group
                
                  v-for="(h, index) in p.horas"
                  :key="index"
                 
                  active-class="accent-1 text-dark"
                  row
                  class="d-flex flex-column py-0"
                >
                  <p
                    class="text-danger mb-0"
                    v-if="
                      h.time == '19:00' ||
                      h.time == '20:30' ||
                      dayofweek(p.date) == 0
                    "
                  >
                    <label
                      class="btn btn-outline-danger button-danger-override my-0"
                    >
                      <input
                        type="radio"
                        name="time"
                        value="h.time"
                        class="my-0"
                        @click="detalles(p.pistas.id,h.cita_id,p.date,h.time,h.id)"
                        required
                      />
                      <span class="text-danger">{{ h.time }}</span>
                    </label>
                  </p>

                  <p class="text-primary mb-0" v-else>
                    <label class="btn btn-outline-primary my-0">
                      <input type="radio" name="time" value="h.time" @click="detalles(p.pistas.id,h.cita_id,p.date,h.time,h.id)" required />
                      <span>{{ h.time }} </span>
                    </label>
                  </p>
                </v-chip-group>
              </v-card-text>
              
              

            </v-card>
          </div>
        </div>
        <div class="modal" tabindex="-1" id="modalDetalle" ><strong><span id="pname"></span></strong>
  <div class="modal-dialog">
   
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reserva para el dia {{ info.dia | formatDate }}

        </h5>
        <button type="button" class="btn-close cerrarModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Nombre: Pista {{info.id}}</p>
        <p>Hora: {{info.hora}}</p>
        <p>Cita_id: {{info.cita}}</p>
        <p>Hora_id: {{info.hora_id}}</p>
        <p>Precio : {{ getPrecio(info.hora, info.dia)}}€</p>
      

      </div>
      <div class="modal-footer">
       
   <div class="card">
    
<input type="hidden" name="pistaId"  id="pista_id" :value="info.id">
<input type="hidden" name="citaId" id="cita_id" :value="info.cita">
<input type="hidden" name="date" id="date" :value="info.dia">
<input type="hidden" name="id" id="id" :value="info.hora_id">
<input type="hidden" name="time" id="time" :value="info.hora">
<input type="hidden" name="price" id="price" :value="getPrecio(info.hora, info.dia)">

 
                              
        	<button type="submit" class="btn btn-primary mb-2" @click="addToCart()" >Añadir al carrito</button>

           
                   
                   
                    
               </div>

      </div>
    </div>
  </div>
</div>
        <div v-if="pistas.length == 0">
          No hay pista disponible para <span v-if="this.time"> el día {{ this.time | formatDate }} </span>
                             <span v-else> hoy </span>
                             
        </div>
      </div>
      
      <p class="text-center" v-if="pistas.length > 0">
        <img
          id="horaPico"
          class="icono-reserva-azul"
          :src="'/images/azul2.png'"
          style="
            border-width: 0px;
            vertical-align: middle;
            margin-right: 5px;
            witdth: 12px;
            height: 12px;
          "
        /><span
          id="ctl00_ContentPlaceHolderContenido_Label5"
          class="icono-reserva-azul"
          style="margin-right: 10px"
          >Hora Valle 12€</span
        >
        <img
          id="horaPico"
          class="icono-reserva-rojo"
          :src="'/images/rojo2.jpeg'"
          style="
            border-width: 0px;
            vertical-align: middle;
            margin-right: 5px;
            witdth: 12px;
            height: 12px;
          "
        /><span
          id="ctl00_ContentPlaceHolderContenido_Label5"
          class="icono-reserva-azul"
          style="margin-right: 10px"
          >Hora Pico 20€</span
        >
      </p>
    </div>
  
  </div>
  
</template>

<script type="text/javascript">
import Vue from "vue";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
Vue.use(Vuetify);
import datepicker from "vuejs-datepicker";
import { es } from "vuejs-datepicker/dist/locale";
import moment from "moment";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
    moment.locale('es');
      
export default {
  data() {
    const now = new Date();
    const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
   csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    return {
      value: "",
      pistas: [],
      es: es,
      loading: false,
      info: [], 
      dow: "",
      disabledDates: {
        to: new Date(Date.now() - 86400000),
      },
    };
  },
  components: {
    datepicker,
    PulseLoader,
    Vuetify,
   
  },
  methods: {
    detalles(id,cita,dia,hora,hora_id){
      this.info={id,cita,dia,hora,hora_id}
     
      
      $('#modalDetalle').modal('show')
    },
    addToCart(){
      var id = $('#id').val();
      var pista_id = $('#pista_id').val();
      var price = $('#price').val();
      var date = $('#date').val();
      var cita_id = $('#cita_id').val();
     
      var fecha=  moment(date).format('LL');
      var time = $('#time').val();
     
      console.log(id,date,time,pista_id,price,cita_id);
      $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                id:id,pista_id:pista_id,date:date, price:price,cita_id:cita_id
            },
            url: "/cart/data/store",
            success:function(data){
                console.log(data)
                 miniCart(),
                 $('.cerrarModal').click();
                 // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                    .then((response) => {
          setTimeout(() => {
          
                    window.location.href = '/mycart'
          }, 400);
        })
                }else{
                    Toast.fire({
                       type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
      
            }
        })
        
  
    },
   
  
    customDate(date) {
      this.loading = true;
      this.time = moment(date).format("YYYY-MM-DD");
      axios
        .post("/api/findpista", { date: this.time })
        .then((response) => {
          setTimeout(() => {
            this.pistas = response.data;
            this.loading = false;
          }, 1000);
        })
        .catch((error) => {
          alert("error");
        });
    },
    dayofweek(value) {
      
      const now = new Date(value);
      const dow = now.getDay();
      return dow;
    },
    getPrecio(hora,dia){
      let precio;
      const now = new Date(dia);
      const fecha = now.getDay();
       if(
     hora == '19:00' ||
     hora == '20:30' ||
     fecha == 0
   )
   return  precio = 20;
   else{
       return precio = 12;
   }
    }
  },
  mounted() {
    this.loading = true;
    axios.get("/api/pista/hoy").then((response) => {
      this.pistas = response.data;
      this.loading = false;
      console.log(this.pistas);
    });
   
  },
  
};
</script>



<style scoped>
.my-datepicker >>> .my-datepicker_calendar {
  width: 100%;
  height: 330px;
  font-weight: bold;
}
.my-picker-class {
  border: none !important;
  border-bottom: 1px solid #f26f31 !important;
}
.pista {
  height: 180px;
  width: 220px;
}
.pista img {
  border: 2px solid #2dce89;
  box-shadow: 5px 10px 18px #888888;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  border-radius: 25px 25px 25px 25px;
  -moz-border-radius: 25px 25px 25px 25px;
  -webkit-border-radius: 25px 25px 25px 25px;
}
.button-danger-override:hover {
  background-color: #f5365c !important;
  border: 0 !important;
  overflow: hidden;
}
.button-danger-override:hover span {
  transition: all 0.3s;
  color: #fff !important;
}
label.btn input:checked + span {
  background-color: rgb(93 64 200);
  padding: 4px;
}
.btn-reservar {
  background-color: rgb(93 64 200);
  bottom: 10px;
  left: 40px;
  position: absolute;
  display: block;
  width: 80%;
  margin-top: 20px !important;
}
.tarjeta {
  position: relative;
  border: 1px solid #d9cdee;
}
</style>
