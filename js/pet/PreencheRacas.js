function atualizarRacas() {
    var racaSelect = document.getElementById('racaSelect');
    var tipoPetSelecionado = document.querySelector('input[name="pet[\'tipo\']"]:checked').value;

    // Limpar todas as opções do select
    racaSelect.innerHTML = '';

    if (tipoPetSelecionado === 'Cachorro') {
      // Adicionar opções de raça para cachorro
      var racasCachorro = [' Afghan Hound ', ' Aidi ', ' Airedale Terrier ', ' Akita Americano ', ' Akita Inu ', ' American Bully ', ' American Staffordshire Terrier ', ' Basenji ', ' Basset Artesiano Normando ', ' Basset Fulvo da Bretanha ', ' Basset Hound ', ' Beagle ', ' Beagle Harrier ', ' Bedlington Terrier ', ' Belgian Laekenois ', ' Belgian Malinois ', ' Belgian Sheepdog ', ' Belgian Tervuren ', ' Bernese Mountain Dog ', ' Bichon Bolonhês ', ' Bichon Frise ', ' Biewer Terrier ', ' Black and Tan Coonhound ', ' Bloodhound ', ' Boerboel ', ' Boiadeiro da Flanders ', ' Boiadeiro de Entlebuch ', ' Border Collie ', ' Border Terrier ', ' Borzoi ', ' Boston Terrier ', ' Boxer ', ' Braco Alemão ', ' Braco de Auvergne ', ' Braco de Bourbonnais ', ' Braco Húngaro de Pelo Duro ', ' Braco Italiano ', ' Bulldog ', ' Bulldog Americano ', ' Bulldog Campeiro ', ' Bulldog Inglês ', ' Bull Terrier Miniatura ', ' Bullmastiff ', ' Cairn Terrier ', ' Cane Corso ', ' Cavalier King Charles Spaniel ', ' Cesky Fousek ', ' Chesapeake Bay Retriever ', ' Chihuahua ', ' Chow Chow ', ' Cimarrón Uruguayo ', ' Cirneco do Etna ', ' Clumber Spaniel ', ' Cocker Spaniel Americano ', ' Cocker Spaniel Inglês ', ' Corgi ', ' Dachshund ', ' Dalmatian ', ' Deerhound ', ' Doberman ', ' Dog Alemão ', ' Dogue de Bordeaux ', ' Elkhound Norueguês ', ' Fox Paulistinha ', ' Fox Terrier de Pelo Duro ', ' Fox Terrier de Pelo Liso ', ' Foxhound Inglês ', ' Galguinho Italiano ', ' Golden Retriever ', ' Greyhound ', ' Griffon de Bruxelas ', ' Jack Russell Terrier ', ' Keeshond ', ' Komondor ', ' Kuvasz ', ' Labrador ', ' Lhasa Apso ', ' Lulu da Pomerânia ', ' Malamute do Alasca ', ' Maltese ', ' Mastiff ', ' Mastim Napolitano ', ' Mastim Tibetano ', ' Maltês ', ' Norfolk Terrier ', ' Old English Sheepdog ', ' Pastor Alemão ', ' Pastor Australiano ', ' Pastor Belga ', ' Pastor Belga Malinois ', ' Pastor Belga Groenendael ', ' Pastor Bergamasco ', ' Pastor Branco Suíço ', ' Pastor de Beauce ', ' Pastor do Cáucaso ', ' Pastor Maremano Abruzês ', ' Pastor de Shetland ', ' Pastore Cão Lobo Checoslovaco ', ' Pastore Podengo Português ', ' Pastore Schnauzer Miniatura ', ' Pastore Setter Irlandês ', ' Pastore Tervuren ', ' Pastore Terra Nova Cachorro ', ' Pekingese ', ' Pinscher ', ' Pitbull ', ' Pointer Inglês ', ' Poodle ', ' Pug ', ' Rottweiler ', ' Samoieda ', ' Schnauzer Gigante ', ' Schnauzer Miniatura ', ' Shih Tzu ', ' Shar Pei ', ' Spaniel Bretão ', ' Spaniel de Springer Inglês ', ' Staffordshire Bull Terrier ', ' Terrier Checo ', ' Terrier Tibetano ', ' Vira Lata ', ' Vizsla ', ' Weimaraner ', ' Whippet ', ' Yorkshire Terrier '];
      for (var i = 0; i < racasCachorro.length; i++) {
        var option = document.createElement('option');
        option.value = racasCachorro[i];
        option.text = racasCachorro[i];
        racaSelect.appendChild(option);
      }
    } else if (tipoPetSelecionado === 'Gato') {
      // Adicionar opções de raça para gato
      var racasGato = ['Abissínio', 'American Shorthair', 'American Wirehair', 'Angorá', 'Azul Russo', 'Birmanês', 'Bobtail Americano', 'Bombaim', 'British Shorthair', 'Burmilla', 'Cymric', 'Exótico', 'Gato de Pelo Curto Brasileiro', 'Gato de Pelo Curto Europeu', 'Gato Vira Lata', 'Himalaio', 'Maine Coon', 'Persa', 'Ragdoll', 'Siamês', 'Sphynx'];
      for (var i = 0; i < racasGato.length; i++) {
        var option = document.createElement('option');
        option.value = racasGato[i];
        option.text = racasGato[i];
        racaSelect.appendChild(option);
      }
    }
  }