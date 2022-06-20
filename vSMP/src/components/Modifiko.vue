<template>
  <div class="ModifikoPikturen container">
    <h2 class="page-header"><b>Modifiko Pikturen</b></h2>
	<Njofto v-if="alert" v-bind:mesazhi="alert" />
    <form  v-on:submit="ModifikoPikturen">
        <div class="well">
            <h4 style="color:blue">Informacionet Baze</h4><br>
            <div class="form-group">
                <label>Titulli i piktures</label>
			    <input type="text" class="form-control"  v-model="piktura.TitulliPiktures_SMP"/>
            </div>
            <div class="form-group">
                <label>Piktori</label>
			    <input type="text"  class="form-control" v-model="piktura.Piktori_SMP"/>
            </div>
        </div>
        <div class="well">
            <h4 style="color:blue">Detajet e piktures</h4><br>
            <div class="form-group">
                <label>Dimensioni i piktures</label>
				<input type="text" class="form-control"  v-model="piktura.DimensioniPiktures_SMP"/>
            </div>
			<div class="form-group">
                <label>Cmimi Piktures</label>
                <input type="text"  class="form-control"  v-model="piktura.CmimiPiktures_SMP"></input>
            </div>
        </div>
        <div class="well">
            <h4 style="color:blue">Informacionet shtese</h4><br>
            <div class="form-group">
                <label>Viti Pikturimit</label>
			    <input type="text" class="form-control" v-model="piktura.VitiPikturimit_SMP"/>
            </div>
			<div class="form-group">
                <label>Pershkrimi Piktures</label>
			    <textarea type="text" class="form-control" v-model="piktura.PershkrimiPiktures_SMP"></textarea>
            </div>
            <div class="form-group">
                <label>Stili Pikturimit</label>
			    <input type="text" class="form-control"  v-model="piktura.StiliPikturimit_SMP"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Modifiko</button>
    </form><br><br><br>
  </div>
</template>

<script>
	import Njofto from './Njofto'
    export default {
    name: 'ModifikoPikturen',
    data () {
        return {
        piktura: {},
        alert:''
        }
    },
    methods: {
        fetchpiktura(ID_SMP){
            this.$http.get('http://slimapp/api/piktura/'+ID_SMP)
            .then(function(response){
                this.piktura = response.body;
            });
        },
        ModifikoPikturen(e){
            if(!this.piktura.TitulliPiktures_SMP || !this.piktura.Piktori_SMP || !this.piktura.StiliPikturimit_SMP){
                this.alert = 'Ju lutemi plotësoni të gjitha fushat';
            } else {
                let ModifikoPikturen = {
                    TitulliPiktures_SMP: this.piktura.TitulliPiktures_SMP,
					Piktori_SMP: this.piktura.Piktori_SMP,
					StiliPikturimit_SMP: this.piktura.StiliPikturimit_SMP,
					DimensioniPiktures_SMP: this.piktura.DimensioniPiktures_SMP,
					VitiPikturimit_SMP: this.piktura.VitiPikturimit_SMP,
					PershkrimiPiktures_SMP: this.piktura.PershkrimiPiktures_SMP,
					CmimiPiktures_SMP: this.piktura.CmimiPiktures_SMP
                }
                this.$http.put('http://slimapp/api/piktura/modifiko/'+this.$route.params.ID_SMP, ModifikoPikturen)
                    .then(function(response){
                        this.$router.push({path: '/', query: {alert: 'piktura u modifikua'}});
                    });
                e.preventDefault();
            }
            e.preventDefault();
        }
    },
    created: function(){
        this.fetchpiktura(this.$route.params.ID_SMP);
    },
	components: {
		Njofto
	}
}
</script>