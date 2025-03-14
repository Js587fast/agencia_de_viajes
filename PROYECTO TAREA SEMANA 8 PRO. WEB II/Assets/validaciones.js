function validarVuelo() {
  let plazas = document.querySelector('input[name="plazas_disponibles"]');
  if (!plazas || isNaN(plazas.value) || plazas.value <= 0) {
    alert("Las plazas disponibles deben ser un número mayor a 0.");
    return false;
  }
  return true;
}

function validarHotel() {
  let habitaciones = document.querySelector(
    'input[name="habitaciones_disponibles"]'
  );
  if (!habitaciones || isNaN(habitaciones.value) || habitaciones.value <= 0) {
    alert("Las habitaciones disponibles deben ser un número mayor a 0.");
    return false;
  }
  return true;
}
