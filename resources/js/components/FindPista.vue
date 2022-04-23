<template>
	<div>
		<div class="card">
			<div class="card-header">Buscar Pista</div>
			<div class="card-body">
			<datepicker class="my-datepicker" calendar-class="my-datepicker_calendar"    :disabledDates="disabledDates"  :format="customDate" v-model="value"  :inline=true :language="es" :monday-first=true></datepicker>
			</div>
			



		<div class="card mt-5">
			<div class="card-header">Pistas</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							
							<th class="text-center">Imagen</th>
							<th>Pista</th>
							<th>Horas disponibles (90 min)</th>
							<th>Reservar</th>
						</tr>

					</thead>
                    <tbody>
						<tr v-for="(p,index) in pistas" :key="index" >
								
          <v-card
    :loading="loading"
    class="mx-auto my-12 mt-5"
    max-width="374"
  >
    <template slot="progress">
      <v-progress-linear
        color="#615708"
        height="10"
        indeterminate
      ></v-progress-linear>
    </template>

    <v-img
      height="250"
      :src="'/images/'+ p.pistas.image"
    ></v-img>

    <v-card-title>{{p.pistas.name}}</v-card-title>

   

    <v-divider class="mx-4"></v-divider>

    <v-card-title>Disponibilidad para el día <br/>
    </v-card-title>
<div class="grey--text ms-4">
{{p.date | formatDate}}
         
        </div>
    <v-card-text>
      <v-chip-group v-for="(h,index) in p.horas" :key="index"
        v-model="selection"
        active-class="deep-purple accent-4 white--text"
        column
      >
     
        <v-chip color="#7851A9" class="d-flex  flex-row  text-white">
{{h.time}}
        </v-chip>

      </v-chip-group>
    </v-card-text>

    <v-card-actions>
      <v-btn
        color="#615708 lighten-2"
        text
        @click="reserve"
      >
        Reserve
      </v-btn>
    </v-card-actions>
  </v-card>
						
								
								<td class="pista">
									<img  :src="'/images/'+ p.pistas.image" >
								</td>
								<td class="fw-bold text-uppercase fs-5">{{p.pistas.name}}</td>
								
								<td class="mb-0">
									<ul class="list-unstyled text-decoration-none mb-0">
										<li v-for="(h,index) in p.horas" :key="index">   
                                            <div   v-if="h.status ==0">
												<p class="text-danger mb-1" v-if="h.time =='19:00'|| h.time =='20:30' || dayofweek(p.date)==0"> 
													<label class="btn btn-outline-danger button-danger-override my-0">
														<input type="radio" name="time" value="h.time" class="my-0" >
														<span class="text-danger" >{{h.time}}</span>
													</label> 
												</p>	

												<p class="text-primary mb-1" v-else>
													<label class="btn btn-outline-primary my-0">
													   <input type="radio" name="time" value="h.time" >
                                                        <span>{{h.time}}  </span>
								                    </label> 
											  </p>	
                
											 </div>
										</li>
									</ul>
											  
								</td>
								<td>
			<a :href="'/nueva-cita/'+ p.pistas.id+'/'+p.date " v-if="p.horas.length !=0"><button class="btn btn-success">Reservar Pista</button></a>
								</td>
							
							</tr>
							<td v-if="pistas.length==0">No hay pista disponible para este día {{this.time | formatDate}}</td>
						</tbody>
								<caption class="text-center" v-if="pistas.length>0">
 <img id="horaPico" class="icono-reserva-azul" :src="'/images/azul2.png'" style="border-width:0px;vertical-align: middle; margin-right: 5px;witdth:12px;height:12px;" /><span id="ctl00_ContentPlaceHolderContenido_Label5" class="icono-reserva-azul" style="margin-right: 10px">Hora Valle 12€</span>
											   <img id="horaPico" class="icono-reserva-rojo" :src="'/images/rojo2.jpeg'" style="border-width:0px;vertical-align: middle; margin-right: 5px;witdth:12px;height:12px;" /><span id="ctl00_ContentPlaceHolderContenido_Label5" class="icono-reserva-azul" style="margin-right: 10px">Hora Punta 20€</span>
								</caption>
				</table>
				
















				<div class="text-center">
					<pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>
				</div>


					
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	import datepicker from 'vuejs-datepicker';
	import { es } from 'vuejs-datepicker/dist/locale'
	import moment from 'moment';
	import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
	export default{
		data(){
		const now = new Date();
      const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())
   
      
			return{
				value: '',
				pistas:[], 
				es: es,
				loading:false,
				dow:'',
				disabledDates:{
					to:new Date(Date.now() - 86400000)
				},
			}
		},
		
		components:{
			datepicker,
		PulseLoader
			
		},
		methods:{
		customDate(date){
				this.loading =true
				
				this.time = moment(date).format('YYYY-MM-DD');
			
			
				axios.post('/api/findpista',{date:this.time}).
				then((response)=>{

					setTimeout(()=>{  
						this.pistas =response.data
						this.loading=false
						 
					},1000)
					


				}).catch((error)=>{alert('error')})
			},
			dayofweek(value){
				console.log(value);
				
             const now = new Date(value);
			 const dow = now.getDay();
			 return dow;
			}
		},
		mounted(){
		//let time = moment(date).parseZone("Australia/Melbourne");
			this.loading=true
			axios.get('/api/pista/hoy').then((response)=>{
				this.pistas = response.data
				this.loading=false
				console.log(this.pistas);
			})
		},
		
	}
</script>

<style scoped>
	.my-datepicker >>> .my-datepicker_calendar{
		width: 100%;   
		height: 300px;
		font-weight: bold;
	}
	.my-picker-class{
            border: none !important;
            border-bottom: 1px solid #F26F31 !important;
           }
		   .pista {
 height:180px;
 width: 220px;
}
    
	.pista img { 
		border: 2px solid #2dce89;
		box-shadow: 5px 10px 18px #888888;
  width:100%;
  height:100%;
  object-fit: cover;
   object-position: center;

   border-radius: 25px 25px 25px 25px;
-moz-border-radius: 25px 25px 25px 25px;
-webkit-border-radius: 25px 25px 25px 25px;
	}
	.button-danger-override:hover 
{
    background-color: #f5365c !important;
   
    border: 0 !important;
}
.button-danger-override:hover span{
	transition: all .3s;
	color: #fff !important;
}
</style>
