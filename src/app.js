document.addEventListener('alpine:init', () => {
    Alpine.data('products', () => ({
        items: [
            { id: 1, name: 'Le Minerale', img: 'LeMinerale.png', price: 22000},
            { id: 2, name: 'Aqua', img: 'Aqua.png', price: 21000},
            { id: 3, name: 'Isi Ulang', img: 'IsiUlang.png', price: 6000},
            { id: 4, name: 'Galon Kosong', img: 'GalonKosong.png', price: 36000},
        ],
    }));
});