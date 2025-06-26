    async function buscar() {
      const frm_texto = document.getElementById('texto').value.trim();  
      const resultado = document.getElementById('resultado');
      resultado.innerHTML = ''; 

      const dato = { texto: frm_texto };

      try {
        const respuesta = await fetch('./api.php',{ 
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dato)
        });
        
        if (!respuesta.ok) throw new Error('ERROR');

        const contenido = await respuesta.json();

        resultado.innerHTML = `
          <div class="card">
            <div class="user">
              <div>
                <p>${contenido.texto}</p>
              </div>
            </div>
          </div>
        `;
      } catch (error) {
        resultado.innerHTML = `<p>Error: ${error.message}</p>`;
      }
    }