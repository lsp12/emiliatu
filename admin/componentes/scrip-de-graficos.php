<script>
        let ctx = document.getElementById('confirmados2');
        var myChart = new Chart(ctx, {
        
        type: 'line',
        data: {
            labels: [`febrero`, `marzo`, 'abril', 'mayo', 'junio', 'julio','agosto'],
            
           
            datasets: [{
                    label: 'muertes',
                    data: [0, 10, 5, 80, 100, "350","<?php echo $fallecidos ?>" ],
                    backgroundColor: 'rgba(118, 0, 0,0.2)',
                    
                borderColor: 'rgb(118, 211, 218)',
                
                    borderWidth: 2
         
                },{
                    label: 'confirmados',
                    data: [6, 120, 500, 1500, 1800, 2799,"<?php echo $contagios ?>"],
                    backgroundColor: [
                        'rgba(54, 75, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 75, 207)'
                    ],
                    borderWidth: 2
         
                },{
                    label: 'recuperados',
                    data: [1, 50, 100, 300, 800, 1500,"<?php echo $recuperados ?>"],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 2
         
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })

    let pro=document.querySelector("#provincia");
    contagiados = new Chart(pro, {
    type: 'bar',
    data: {
        <?php $mostrar->execute(); ?>
        labels: [<?php foreach ($mostrar as $fila) {echo "'". $fila['Cantones'] ."',";} ?>],
        datasets: [{
            label: 'Cantones',
            <?php $mostrar->execute(); ?>
            data: [<?php foreach ($mostrar as $fila) {echo  $fila['Contagiados'] .",";} ?>],
            backgroundColor: 
                'rgba(255, 159, 64, 0.2)',
            borderColor: 
                'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
})
let ctx2 =document.querySelector("#provincia2");
muertes = new Chart(ctx2, {
        
        type: 'bar',
        data: {
            labels: [<?php $mostrar->execute(); foreach ($mostrar as $fila) {echo "'". $fila['Cantones'] ."',";}?>],
            datasets: [{
                    label: 'muertes',
                    data: [<?php $mostrar->execute(); foreach ($mostrar as $fila) {echo  $fila['Muertos'] .",";}?>],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    
                borderColor: 'rgba(255, 99, 132, 0.2)',
                
                    borderWidth: 2
         
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })

let ctx3=document.querySelector("#provincia3");
recuperados = new Chart(ctx3, {
        
        type: 'bar',
        data: {
            labels: [<?php $mostrar->execute(); foreach ($mostrar as $fila) {echo "'". $fila['Cantones'] ."',";}?>],
            datasets: [{
                    label: 'recuperado',
                    data: [<?php $mostrar->execute(); foreach ($mostrar as $fila) {echo  $fila['Recuperados'] .",";}?>],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    
                borderColor: 'rgba(75, 192, 192, 0.2)',
                
                    borderWidth: 2
         
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    const formulario=document.querySelector("#formulario")
    if(formulario){
    formulario.addEventListener("click",actualizarDatos);
    }
     function actualizarDatos(){
        
    }
    </script>