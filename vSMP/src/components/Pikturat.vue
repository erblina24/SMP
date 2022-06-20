<template>

<div class="Pikturat container">
    <Njofto v-if="alert" v-bind:mesazhi='alert' />
<h1 class="page-header">Menaxho Pikturat</h1>
 <input class="form-control" placeholder="Ju lutem jepni Titullin e piktures" v-model="filterHyrja">
	 <br>
<table class="table table-striped">
<thead>
<tr>
<th>Titulli i Piktures</th>
<th>Piktori</th>
<th>Stili Pikturimit</th>
<th>Dimensioni Piktures</th>
<th>Viti Pikturimit</th>
<th>Pershkrimi</th>
<th>Cmimi Piktures</th>
<th>Modifiko</th>
<th>Fshij</th>

</tr>
</thead>
<tbody>
	   <tr v-for="piktura in FilterPrej(pikturat, filterHyrja)">
<td>{{piktura.TitulliPiktures_SMP}}</td>
<td>{{piktura.Piktori_SMP}}</td>
<td>{{piktura.StiliPikturimit_SMP}}</td>
<td>{{piktura.DimensioniPiktures_SMP}}</td>
<td>{{piktura.VitiPikturimit_SMP}}</td>
<td>{{piktura.PershkrimiPiktures_SMP}}</td>
<td>{{piktura.CmimiPiktures_SMP}}</td>
<td>
    <router-link class="btn btn-primary" v-bind:to="'/Modifiko/'+piktura.ID_SMP">Modifiko</router-link> 
</td>
<td>
    <button class="btn btn-danger " v-on:click="Fshij(piktura.ID_SMP)">Fshij</button> <br>
</td>
</tr>
</tbody>
</table>
</div>
</template>

<script>
import Njofto from './Njofto';

export default {
name: 'pikturat',
data () {
return {
pikturat: [],
	alert:'',
	filterHyrja:''
}
},
methods: {
fetchpiktura(){
this.$http.get('http://slimapp/api/pikturat')
.then(function(response){
this.pikturat = response.body;
});
},
FilterPrej(list, value){
				value=value.charAt(0).toUpperCase()+value.slice(1);		
				return list.filter(function(piktura){				
					return piktura.TitulliPiktures_SMP.indexOf(value) > -1;
				});
			},
Fshij(ID_SMP){
				this.$http.delete('http://slimapp/api/piktura/fshij/'+ID_SMP)
				.then(function(response){
					this.$router.push({path: '/', query: {alert: 'Piktura u fshij!'}});
					window.location.reload();
				});
			}
},
created: function(){
	 if(this.$route.query.alert){
				this.alert = this.$route.query.alert;
	  		}
this.fetchpiktura();
},
updated: function() {
    this.fetchpiktura();
   
},
components: {
			Njofto
		}
}
</script>