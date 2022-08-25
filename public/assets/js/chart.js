/*
=========================================
|        Recap Tipe Kepribadian  all  |
=========================================
*/ 
let url = "{{url('admin/chartall')}}"
let TipeKep = new Array();
let DataKep = new Array();
$(document).ready(function(){
   $.get(url, function(response){
      response.forEach(function(data){
         TipeKep.push(data.tipekep_id);
         DataKep.push(data.user_id);
      });
   });
   var recapTipe = document.getElementById('tipeChart').getContext('2d');
   var myChart = new Chart(recapTipe, {
      type: 'bar',
      data: {
         labels: ['INTJ', 'INTP', 'ENTJ', 'ENTP', 'INFJ', 'INFP', 'ENFJ', 'ENFP', 'ISTJ', 'ISFJ', 'ESTJ', 'ESFJ', 'ISTP', 'ISFP', 'ESTP', 'ESFP'],
         datasets: [{
            label:'Tipe Kepribadian Dominan',
            data: [12, 19, 23, 15, 20, 13, 23, 34, 12, 18, 23, 54, 28, 17, 29, 17],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 2
         }]
      }
   });
});

//**TODO : Untuk pengaplikasian data dari API, dapat melihat video https://www.youtube.com/watch?v=5-ptp9tRApM  */ 

/*
=========================================
|           Teknik Informatika          |
=========================================
*/ 
var TI  = document.getElementById("radar-chart");
var myspy = new Chart(TI, {
   type: 'radar',
   data: {
   labels: ["Introvert", "Sensing", "Thinking", "Judging", "Extrovert", "Intuition", "Feeling", "Perceiving"],
   datasets: [
      {
         label: "Dominan Dimensi",
         fill: true,
         backgroundColor: "rgba(232, 252, 126,0.5)",
         borderColor: "rgba(255, 255, 0, 1)",
         pointBorderColor: "rgba(255, 118, 1, 1)",
         pointBackgroundColor: "rgba(179,181,198,1)",
         data: [85,65,70,60,45,70,25,40]
      }
   ]
   },
   options: {
      title: {
         display: true,
         text: 'Recap Tes Kepribadian Teknik Informatika',
      }
   }
}); 
/*
=========================================
|              Teknik Sipil           |
=========================================
*/ 
var SIPIL  = document.getElementById("radar-chart2");
var myspy = new Chart(SIPIL, {
   type: 'radar',
   data: {
   labels: ["Introvert", "Sensing", "Thinking", "Judging", "Extrovert", "Intuition", "Feeling", "Perceiving"],
   datasets: [
      {
         label: "Dimensi Dominan",
         fill: true,
         backgroundColor: "rgba(75, 192, 192, 0.3)",
         borderColor: "rgba(66, 151, 160, 1)",
         pointBorderColor: "rgba(2, 16, 108, 1)",
         pointBackgroundColor: "rgba(179,181,198,1)",
         data: [60,65,70,60,85,65,25,40]
      },
   ]
   },
   options: {
   title: {
      display: true,
      text: 'Recap Tes Kepribadian Teknik Sipil',
      // fontSize = "value|initial|inherit"
   }
   }
});
/*
=========================================
|              Teknik Mesin           |
=========================================
*/ 
var MESIN  = document.getElementById("radar-chart3");
var myspy = new Chart(MESIN, {
   type: 'radar',
   data: {
   labels: ["Introvert", "Sensing", "Thinking", "Judging", "Extrovert", "Intuition", "Feeling", "Perceiving"],
   datasets: [
      {
         label: "Dimensi Dominan",
         fill: true,
         backgroundColor: "rgba(255,99,132,0.2)",
         borderColor: "rgba(255,99,132,1)",
         pointBorderColor: "rgba(144, 0, 8, 1)",
         pointBackgroundColor: "rgba(179,181,198,1)",
         data: [20,35,70,30,75,75,66,45]
      },
   ]
   },
   options: {
   title: {
      display: true,
      text: 'Recap Tes Kepribadian Teknik Mesin',
      // fontSize = "value|initial|inherit"
   }
   }
});
/*
=========================================
|        Teknik Manufaktur Kapal        |
=========================================
*/ 
var TMK  = document.getElementById("radar-chart4");
var myspy = new Chart(TMK, {
   type: 'radar',
   data: {
   labels: ["Introvert", "Sensing", "Thinking", "Judging", "Extrovert", "Intuition", "Feeling", "Perceiving"],
   datasets: [
      {
         label: "Dimensi Dominan",
         fill: true,
         backgroundColor: "rgba(75, 192, 192, 0.4)",
         borderColor: "rgba(6, 139, 228, 1)",
         pointBorderColor: "rgba(13, 36, 76, 1)",
         pointBackgroundColor: "rgba(179,181,198,1)",
         data: [30,60,75,65,50,75,66,45]
      },
   ]
   },
   options: {
   title: {
      display: true,
      text: 'Recap Tes Kepribadian Agribisnis',
      // fontSize = "value|initial|inherit"
   }
   }
});
/*
=========================================
|      Manajemen Bisnis Pariwisata      |
=========================================
*/ 
var MBP  = document.getElementById("radar-chart5");
var myspy = new Chart(MBP, {
   type: 'radar',
   data: {
   labels: ["Introvert", "Sensing", "Thinking", "Judging", "Extrovert", "Intuition", "Feeling", "Perceiving"],
   datasets: [
      {
         label: "Dimensi Dominan",
         fill: true,
         backgroundColor: "rgba(232, 252, 126,0.4)",
         borderColor: "rgba(248, 202, 10, 1)",
         pointBorderColor: "rgba(120, 104, 7, 1)",
         pointBackgroundColor: "rgba(179,181,198,1)",
         data: [30,60,75,65,50,75,66,45]
      },
   ]
   },
   options: {
   title: {
      display: true,
      text: 'Recap Tes Kepribadian Agribisnis',
      // fontSize = "value|initial|inherit"
   }
   }
});
/*
=========================================
|   Teknologi Pengolahan Hasil Ternak   |
=========================================
*/ 
var TPHT  = document.getElementById("radar-chart6");
var myspy = new Chart(TPHT, {
   type: 'radar',
   data: {
   labels: ["Introvert", "Sensing", "Thinking", "Judging", "Extrovert", "Intuition", "Feeling", "Perceiving"],
   datasets: [
      {
         label: "Dimensi Dominan",
         fill: true,
         backgroundColor: "rgba(205, 161, 66, 0.3)",
         borderColor: "rgba(102, 62, 5, 1)",
         pointBorderColor: "rgba(235, 141, 7, 1)",
         pointBackgroundColor: "rgba(179,181,198,1)",
         data: [30,60,75,65,50,75,66,45]
      },
   ]
   },
   options: {
   title: {
      display: true,
      text: 'Recap Tes Kepribadian Agribisnis',
      // fontSize = "value|initial|inherit"
   }
   }
});
/*
=========================================
|               Agribisnis              |
=========================================
*/ 
var AGB  = document.getElementById("radar-chart7");
var myspy = new Chart(AGB, {
   type: 'radar',
   data: {
   labels: ["Introvert", "Sensing", "Thinking", "Judging", "Extrovert", "Intuition", "Feeling", "Perceiving"],
   datasets: [
      {
         label: "Dimensi Dominan",
         fill: true,
         backgroundColor: "rgba(75, 192, 192, 0.2)",
         borderColor: "#0cb102",
         pointBorderColor: "#02490c",
         pointBackgroundColor: "rgba(179,181,198,1)",
         data: [30,60,75,65,50,75,66,45]
      },
   ]
   },
   options: {
   title: {
      display: true,
      text: 'Recap Tes Kepribadian Agribisnis',
      // fontSize = "value|initial|inherit"
   }
   }
});