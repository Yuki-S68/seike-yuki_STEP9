const search_form = document.querySelector('.product-list__search-form');

if (search_form) {
    search_form.addEventListener('submit', function (event) {
        // 通常のフォーム送信を止める
        event.preventDefault();

        // フォームの入力内容を取得
        const form_data = new FormData(search_form);
        const search_params = new URLSearchParams(form_data);

        // 非同期で商品を検索
        fetch(search_form.dataset.searchUrl + '?' + search_params.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('検索に失敗しました。');
                }

                return response.text();
            })
            .then(html => {
                // 検索結果の商品一覧を差し替える
                document.querySelector('.product-list__table-body').outerHTML = html;
            })
            .catch(error => {
                console.error(error);
            });
    });
}