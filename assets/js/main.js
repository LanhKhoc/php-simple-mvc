// let img = new Image();
// img.onload = function() {
  // $('.js-loader').fadeOut(300);
  // $('#root').fadeIn(300);
// };
// img.src = '../assets/img/bg.jpg';

$(window).on('load', () => {
  // $('.js-loader').fadeOut(300);
  // $('#root').fadeIn(300);
})

$(() => {
  const CONFIG = {
    host: 'localhost',
    port: '9999',
    rootREL: ''
  }

  class Ajax {
    static serializeObject(arr) {
      return arr.reduce((acc, cur) => {
        return {
          ...acc,
          [cur['name']]: cur['value']
        }
      }, {});
    }

    static getRequest({data, url}) {
      return new Promise((resolve, reject) => {
        $.ajax({
          url: url,
          method: 'GET',
          data: data,
          success: data => resolve(data),
          error: err => reject(err)
        })
      })
    }
  }

  class PhongBan {
    handleSearch(e) {
      e.preventDefault();

      Ajax.getRequest({
        url: `${CONFIG.rootREL}/?route=phongban/search`,
        data: Ajax.serializeObject($(this).serializeArray())
      })
        .then((res) => {
          $('.js-phongban-table tbody').html('');
          const dataRes = JSON.parse(res);

          dataRes.data.forEach((item) => {
            let $ele = $('<tr></tr>');
            $ele.append(`<td>${item.idpb}</td>`);
            $ele.append(`<td>${item.mota}</td>`);
            $ele.append(`<td>${item.thoigian}</td>`);

            let $action = $('<td align="center"></td>');
            $action.append(`
              <a href="${CONFIG.rootREL}/?route=nhanvien&idpb=${item.idpb}" class="ml-3">
                <i class="fas fa-eye"></i>
              </a>
            `);

            if (dataRes.user_logged === true) {
              $action.append(`
                <a href="${CONFIG.rootREL}/?route=phongban/edit&idpb=${item.idpb}" class="ml-3">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="${CONFIG.rootREL}/?route=phongban/destroy&idpb=${item.idpb}" class="ml-3 js-destroy">
                  <i class="fas fa-trash-alt"></i>
                </a>
              `);
            }

            $('.js-phongban-table tbody').append($ele.append($action));
          })
        })
        .catch(error => console.log(error));
    }
  }

  const $searchPB = $('.js-phongban-search');
  const $deleteAction = $('.js-destroy');
  const pb = new PhongBan();

  $searchPB.on('submit', pb.handleSearch);
  $deleteAction.on('click', (e) => { if (confirm('Are you sure?') === false) e.preventDefault(); })
});