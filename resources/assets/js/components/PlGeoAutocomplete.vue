<template>
  <div>
    <input
      class="input"
      type="text"
      placeholder="Informe o endereço: Ex: Rua, Número, Cidade, Estado"
      @focus="geolocate()"
    >
  </div>
</template>

<script>
  export default {
    data (){
      autocomplete: null;
    },

    methods: {
      geolocate(){
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {

            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });

            this.autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    },

    mounted (){
      this.autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('autocomplete')),
        {types: ['geocode']}
      );
    }
  }
</script>

<style>

</style>