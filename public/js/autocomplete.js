$( function() {
    var availableTags = [
        "PUBG",
        "CSGO",
        "ARMA",
        "GTA",
        "RDR",
        "MSG:Survive",
        "Minecraft",
        "DBZ:Fighterz"
    ];
    $( ".tags" ).autocomplete({
        source: availableTags
    });
} );
