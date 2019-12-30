<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('app-title') - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/uikit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/notyf.min.css') }}" rel="stylesheet">
    @yield('stylesheet')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/uikit.js')}}"></script>
    <script src="{{asset('js/uikit-icons.min.js')}}"></script>

</head>

<body>
    <div uk-sticky class="uk-navbar-container tm-navbar-container uk-active">
        <div class="uk-container uk-container-expand">
            <nav uk-navbar>
                <div class="uk-navbar-left">
                    <a id="sidebar_toggle" class="uk-navbar-toggle" uk-navbar-toggle-icon></a>
                    <a href="#" class="uk-navbar-item uk-logo">
                    {{ config('app.name') }}
                    </a>
                </div>
                <div class="uk-navbar-right uk-light">
                    <ul class="uk-navbar-nav">
                        <li class="uk-active">
                            <a href="#">Èrik &nbsp;<span class="ion-ios-arrow-down"></span></a>
                            <div uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header">Options</li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li class="uk-nav-header">Actions</li>
                                    <li><a href="#">Lock</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div id="sidebar" class="tm-sidebar-left uk-background-default" style="padding: 1.5vh !important">
        <center>
            <div class="user">
                <img id="avatar" width="100" class="uk-border-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABj1BMVEX70wP////x8/f3z6I5PUeIbGBLWqf8/P10WU770QDwunr09/r/2AD19vd5WEiFaFu6ramZgntkSlR+X0/q6e2gjISggDg2O0h/Y1j/3wD/4AAxNkPwzqL+1wA0OkSymoD/363w9f8vNknzw4tFVaX//vj3z6f3zq381KX+8r5AUKL/+uP//O/71x4oMkr/++f+88b96Zb83VodKksOI0z96IzFpSclMUEYKT3820RtU1D99u7vtW5mRzmIa0TxyQ6/nSx6hLv+99X977H96aPYuhVZVUEOIU784WnWtxj83VBERkZQTkN5bzVkXj27oISfiXX84nn50UpfPS4rP5u1uthuerfFyeCWnseIkcLX2uqlkClyaDyOfjPTuRWumSIAFk/FrBrhxg+ZhjBlXlxwZl/cv5hISU/RsY90azWGdzGjjnkABT9GRmHWtVrNrnr61HX3z4L40Hn51pWrjDK1lFfMpFlWPEqleFiQc0LZ1NP427rJvLi+tL2pm5hZOz+OfofDt59baa6/xuIeNphZ6ZdeAAAV4ElEQVR4nL2diV8TyZ7AqxMgtAnDFWw6IVEChDNciYQoGOVQQOXQwQM8hkNkfLtv9enu7DCs7y3uH75V3Tn6qLur+X0+M85gqK5vfmcdXQW0a5GRmZXZ8dW1uqyujs+uTI1cy6NBqK2PTE2Oz+3NFzJAxwjIVObvzI1PToXah/AIZ2bnNioAogFbPHSg8WMAKhtzKzNh9SMcwslVCOdkA5lEwjTNFBL4p5mwterkrOyNT4bRF/WEI+N7hWbfERwkM0G1ery+vrn5fnNzfX29CvQEJE0AByT6bGFvXLlzKiacXNsCjk7rAGoOHK8fLRx+frv96IlhTOdanjx99Pbd4YejzWP4tx5I+Bvza2oNViXh5FzFg5cyq+8XTt4+KZZKxeJ0LpdLGwb8d266CH/Ssv3uw9FxJmVmvJBbKiGVEU6tzgOXyWXMRPX9h2dPSiWoN5xAzse57cOjYzOVcDMiTSozV0WEK3tuPMS3vvAs91sRT1cXY/pxafvwPUglgJsRQJ9UE3iUEK5WPCrImGDz8MnjokHFq8n0b7lnR1XTz6hXxhV0Ljjh1FwBw3diPKZrz2WvxdLviNGDiBS5FrgcCEo4c8fLB8zE+3dGiUt9TWstFt8eFWDM8TPOBWQMRjh1x2daCfMY2qcYX43x83uofZ/ohTuBGIMQjvj5gJk5eiRgny7GUu7wGKNGaPZzAQJrAMI1X2egBx6fFItSfEhyj7ffZxJ+NUI9rl4/4XjF7zOJBFSguIE61FjMHRYwlgrbrsxeL+HkvL8P0EIPDXkF1tRYenaMRQRgQ84d5QjnMF8yMAvvSnIe6FJj6dF70+vfNR9Yuy7ClQIuGpjH248D8yEpGkcJnDMiU5Uoc8QJYQTFfb/m5qOSEkBY5BQXCIgAzIVPuOKPMDXAoC7YlFzxQwKTNawnbYmqUZQQ44FIzPWnqjRYQ8QlRlsEvVGMcGoe/1gIqMYH62IUF4iI+oZQ/hciXME/VDer2yo1iCRXWiAkDZT/V0IiJFionqi+VatBCxFGVBIiAAIlDj/hyB7B9xPgs+BIgkumnx6TEfU76gmncDHUktQh30hXUIzp3wsUxC3VhCvEZ6WOWqZDAETVzQk5oEJn5Jyt4iQcz5AeFEKUaSAWNymuCAp8tTgf4SrxMZnESSg2akmO5opQuKZxuAjXiM/QU0dPwrFRJNBOEyTj4UbkIZwjO0MiPBu1EKepdgp0jqzBQXiHCBhaHG3I9DYlniJEdgnHJqQA6ua6wnobJ0bxAdVMORCZhGQThWKeqC9m3JJ7WvBPowohsghpgLq5+TS8MGMLUiJDiwxfZBCuUb8/8yTMMGNL7hNDiUCnR1Q6ITkPXpMKUcZYoGcMKNTUTyWcpX93qRM1YSZL/dscI5wioY2maIQz9GYT69sqCLPGKXWGzijRhlG2FChjYgrhSIGhwg9GWgFh+XTAoObU6XcFlpmCihThFt3BgflMRarIpneiH+lKzNGrU+vr3pAgpJUyQF2cKZ/eHrtVphIW2bGGkhaJhNQwippMHU4rKNjS6fOxsbM0NdhMP2PHGnJAJRFOMltMPFOQDLPlj7ejY9FuuhJb2GYKhbCsQSBkRBlkpMcqImn509lYNDp2vkglLB4xrRQQow2BkDDr5CBMLbQEX4ZJG+cQECrxI02JxvS7DHk6o9kl/Iw/nnCc2Z6SdJ8t795GhEiJNJ/OPWJVbrZgXRFLOMOyUQAyGQVuWD4dswDZSjzmIizgXBFL6F/+9KkwocANbSe0Ec9aKNWDUdzkcUSg73ESrnLYvHkUOBuWP53XAaNjY7cWyRnDKB7yAOKHGRjCGY7vC5VsAQNNuaUJCBEHaHaKQg0fo79AxRAS1pc8hCcBVegGRHb6iWynaHzB44g4O/UTsuMoksS7YG5YNtyAKJ6WiYi5J3yhBmAGUj5CZq63JAOChVKowdtRj9w+XyQhomDKB+jP+z5CRsFdk0T1bQAdpsunZ2NeQBhtdkjDMaO0zkvoK8G9hOx61CYMkizS5Y8DfkDLUFty2IhqlPjShSVTdMINvlYCVKXZsnHrNhYQhZtTrDMapQVuQu/SooeQPjOjgDBrWSgBECWN3XLOX8BxDREbiJM0wgpnI+bmI5lskU0vttzCW2jDGc9by7m0B1KIEMxTCPkyhSyhkS4buwNkBdYQIaORzqWzRrbhk5CQmw/2boVMyKlCGcKskV40dikG6jTVgZ2P6cVyuVHliOnQrUQXIa8KxQmzRnnxE7RPHkCkx+jAwPnOrV0jK0XoUqKLkFeFYpHGgDa3mO4+5+WrG2v09kA9P4rEUiTzBMJx/iac+dDpMF7NZbPpXLn8aXdnICqA17DWJqFAPgRuJToJtwQIHTWNARlQ+MtmDfiPJehPA/180Tjt3jkfiErwuQm5axpbNrCE5A0lfnHUpdm/ne3stn48hZ5mSbn2Z8vpx91b52cDyDgl8NyERe661BZ9BkfIWc7Ykvhc12F257YV/gbOzs7Pz3csOT8/g2gWmySdm1BgbFEj3MMQMtZhPC00J6Kyt25Hxxpid831fyoIeceHzQ6O+An5BhUNwsYYHxGGI01CNOstSLjmJxQLVs15mmsgNIqHIunQkoqPkDvb1wgb6eJaCOnbarA9XPESCqQKW+rB9DoI+Yf4TcI9DyHnyLfZQOrk+gh557zdPZxyE1K3zWAJ66EmfELOdQtvD8fdhPwlae33zePadqhrICyKVaU12XARihqpY+HiGgg5lrkxUjNTIGek1hqwvWkvfMLcW541YH8PV52EokaKCGvr+KETGtMPgIyV1sZQQNJIkZn+XromQikjrVduNiF9+xrh91OH1qxY6ITUPfvUHs42CYXTPbA2l1plTdiEPHuiCLLRIByRa8B8V7oGwtzTqni6t0VvEM5KtaCnrOo7ZEKjxNglTOvhZJ1QaODUlEzicylcwnS6JWcIDn6dhKt1QvFcYTdgvYpQ/luYhEbxhPSyJYfM1winZBsA5uffWhbDIzwrp3N8+6EIUh2xCeXcEFhZ/8n04m6IhOXiIe8KPraDkzaheMnWkNRJcbE74HQMWc7T04+CqNByRETI3j5DbMGsbv/bx7AIx3bKYrP5/v7tWYR8K/eEJlIfiqfU5bIghLulZ0FsFFizNUCuKG0QZsCzfz8LxxHHBk6zgWwUWCMoECDQWE2Y64/6wiIsLuDPjxDo3iQiDBBokKQ+hBVMz4VnSf2E44hwL1gbierfR0NxxPx/VIM5IbD2nAK5gYWzkUxlLB8K4fPAgGgPP9CmAoRSWzJfRsMAjAbuGEDBFASo2RryPAzC6NeAPmiJDglXgjcUipnmnysAhOkC8OyXZUoIZqrGSGG6AEGThSXP1esw/yV4twCaqwGyw1+XFL6qVmI+r0SFMCGCgOnQlsy8csJvCroF0EopCDCycEjhm1rEfLSqolso5QPZKQyPKFZi/quSXqHxE9DU2LtaT1SmQgA2gKamoYzSrD/6DzW9grIFJGeD/aIwJ+a/KVMhqKgjVBds8nk1scHuFhhRUf0hgXaqKO+P/iP4oKIhCgmBrshOR7+pCX51UUeoKJ7mowptFIlCQlBR4IpKndASlYSgEg2KmM8rqbGcopQQPB8Lhpgf3VAYZZCojDSWBENUD4gIFbf4PICh5ke/qAZUmfEbTUqHm3xUweyarzuq6lJnm5JJY/RbRT0gmFc1tnBK4UtevLrJj35VnSaQoNFTGO2KO+No/ou6atsh+h25Mb6uMyJw9cuoEGP+K9NCmc/E/9ac1DxNwkylzEQmQZFM5Qu/peajXzL05tATU2ZGfCVKXxWda0PX44D1hQffv9+ky8l/DvECjg0N/RejtZs3v39/sFlNUA40JfR3XGy+FF3Psfn95v3euz0s+aP3xtJQlEOPkG/pxn//wWywp/3+nzcXqinBV0tmhea8dch38/7dnrt325my/GMS9nxoiLrwlo8ODQ3Bb2Ky6wW7xbvwa23/80E1JaJHNOctsG6Rqt5sh0/hkeW+pDY1tnQDMpIhEd6NG0vRe1qke5mrWQh5/wHxSHoc4RT/2pOeyCzc7+HQngXYndRi2r0BiGhB+jDHhmw8GzCmJVv5ENvbe9pvVgUWv/nXD/VE4fAun/4gYPuFFovFtJG/lizGOqZDaj9eWvrrnvXRi3ZexLs99ze5d4Jtca8B62bhO68CYV8vNdRtFyJWIOCI/UntkpcQqrF3kzOo6nu86/hQg/yA7ctdNiCSv25QEJdu/FX/pKbxRJsmou8CLHy/13j3YujmoQDgj5EGYExDIZUEODTp+GCsTwSRb0+mPsu5n0Y3j9q5TfQFijJN0e6NERCtGOP4YJIzoFqIfwIeRHs/DceeqET1T84k8eJF648LZ79jjZDKAETRpnX5BXdIXeDZEFaY4tzXZn7n0eDyi/bWvq6LiLvfUO7l/fGmHkSdhNrF5Y/udj7Iuzx2qs/z7U3UE9X7TBUuL7d3/7i8iGtaPO4l1DRfSHXEGNcn48nLru7W5WU25R8c75mgQ+p49pfqqQcMFULtQbwkjBbxSCTiI4Q994RUPGAE/bKmJS+6+lp/YakSKtFkngw4zrdHOJNxe2G/R9rbu7suk3EN0VniJ/QguoKom9D6hrSIba/eJ/U7u9HDfg+jvkeYUbfp5vp9lw77W13S23eRjMUaeHglurLG0pDXBS2Ju1pA9trqkU4X4XdmOC2McO3Vh0baTiP85VJz4kHpwPVfuxddIgRRtwoblFqsu5NCePc+61UT601Zjvct9NRNd5zxEnZpnr7hzBSVcFZIxQRRPGEk3kElbO9ZZzii9RopzzsziT9FCXFmaiFCPnwQdRspJyHLEZvvzNBnhTPuXLG8LEuI4s3QEAnQp0IMYa8rvvawXp6tcL675iSENUdrn+e5GEK8maLa8/J/CHw8hJ2t3f2OJMIitI9s5Xj/sEFoZT1Ys/zoZRISlKgdtLUlSYhswv6u5MWP7kZp18PI+fahAxzvkNqEds2ShB9O9skSavHXv068ifHFGQxhb1dHrR6wah4WIXC8Q0rNF4hwebnVqllgNIjLE8b2J9omJn4GIIzE7Xqgqw8OsyEhVYV7vO9yQ8J/9v+4qAc7LkJ80j9om2hrm7jC2qkvkpIII3bRc9m3/E+6DmtHDnC8jw8J/3XR/I6lCbX4w1/boEy8wUVTfxNkQvR3WryLoUPgeh+fZqZ69X8HHQx8hP5oqsX2LUBop/vBCRHjwd9pAbJ+9Af7XAwdrLmLTj5C/xDKslELse0AP64QIoRf4gztuFx91k1INlN9Lj7oeq4coRaxbdRCfOiLpxg3ZBJGBqco9zfU77xgnk+j73UMup/LR+g1U22/Adg27LdTXAtMwsgg7lrbumI0DyHhjCG9MjXoeS4noVuJTRvF26kcYWRwlTSp2Djjs3lOFOGD44Pe58oQapGXTRVi7LRDkjAyuEHQTONgQcZZX/pGhyyh00wbcdRpp05EbANchLN4O22eXc44r82vQn5ChxK1g4lhF6HXTqUJI4P4YKNrfkLsmXuFGRWEWvKhW4UI8aVj1hFrpJyEuCumnSdC089N9AVSKUJUcHsBoZ2+btop9vc5CbHhVJ/CEWIShr7mA+QnbCBqP4eHfYRtE8OvVBBGOjBXwDrPg6afX6rPBiHsqAFq+34VIiU+pBspJ+EgprBxHgdNP4O24ndDccJY7OAlBnF4eJ+uQl5C/0XMrvsDqOcI49xQwkojsVfOdN/0w7gSQr8juk70pp4FjXNDAcJaSuyAXfXb6cQV6i3NSDkJ/Y7ovgKCep43zg1FCOP1/sci3nQB40ys/gnS98NJ6Ctr3IeyU89kx7mhsA7t/zhw2ymyUfcnAhB6LvP1HKzvPVff+XVg3VCIECZ12wTj8X1XVTPxsj5eIhspN+Gk20z1KRqhq7DBuqEQYXM9KhZ57RxbXB3UfydOVCEvYaTDVbh5L7ig3W+BdUMxHTb1Ezu4aihxePh181dwfRYjjDsdUa+M0AmdQ4zCZGDCpsSSbxpKnGh7ReYSJ3Q5ou9CJMo9M3g3lCY8uGoQDrftk21TgtDhiPq8F4hyVxDeDWUJ4QDKUc68VkkYiTgIZ9iEjY0LeDeU1uFPR0aEJSmHmXITNjMi5ipL3J1ddTfEZUNZQpgunIRXlAAjQVi/cFPH3IFIvncNM4ERhDDy2kWYVEo4WStNdczFwOS78whuKE/ozocqCSODtiNi73gk33+or6gkjCUfOgj5gqkAoeWI+hbu4mPyHZb4bChNeNDmqNpcKV8F4WoBvZAxiWMh3kNKyIbShK/clfcbtTpEGZFwjTzxLlmSG0oTumeEXyoljES2dNK1zsT7gAnZUJIwHnGPgWG6UEoIHZF0+zjxTudxQqCRJXwz4SbkCKYihGsFrBPSCDWCG8oRukOpVXuzzVSEcAWTCVmE3s1qAQmv3JGGJ12I+CHBROmEpBk0KcID96Tw8PAbDtPmJ+wgU9AICZP1UoQ/vTNRL1USxikQVEL8uqUEobvutkONwkhDA6QTYhGlCCPetRmeYMpNSGWgE+IQFRFyTGTwEsaCEGIQZQi9yYIvmHIS0gGZhP6cIUXomGirB1N27c1HyABkE2reCVsZQu2Vb2Vm4g1zIoOLkAXIQehFlNKhN1mgUKOEkAnIQ+hBlCD0JwuuqRoOQjYgF6E73MgQ+kKptRkjOCEHIB+hC1GC0Dnf3QymzNqbRdjBA8hJ6ESUITx4iSFkpgsGIbWSESZ0IEoQaq5Jmka6YIUa1v5StYTNMlyG8KdPhc4lRClCXkABwnrulyDELOPzBFMaIWW4JE9Ys1RxQlwo5am9KYRcMUac0EaUIsRZKTOYkvfqi3RaiFDjft/CJf66my+Ykgj5LVSCEKpRgvDgCkfIrL2Jb5SESqjFZAgxgNYiogShmAJlCGHa6P5FkNBfd9uhJk7caEIkFFSgHKGWbO0VIsQmCxRqGIuIXsL+3kuJ3soQatplZyc/IT6UcqQLN2Fnb+uFTF/lCNEbep28hPhQyhFMnYSd/a1dcl2VJNS0i+5eXkJM3V0jZCi/Sdjf25eU7Kg0ITTVmjuyCf11t50uGIuIDcLO3m4pAw1KqHV0dfbzEPonaWqOyFhErBHKOqACQouxl02ITxbseW9E2Nnf2yoTQVURIsbWZTphvANXd9uESWpChIS9vd3B+IITIsZLOmHkDYmQMe8NCQP4nzpCTdOoQ1lSsuBIFx2y8dMpSgipjPi620ak1d4dwhUoXhQRamRIDV9328GUtNAsPIIgizpCEqP28/+IhG34X+GbJuQUlYQaelXL1+WOfTLhMKb2Vqc9WxQTInFD4idp6jr01N7ioz+2hECouVSJm+9uRJrhfcfXodQ2mxIOoSWxjnjcCqW/Dg/jKtPh4YmJ2m7oeEh0SEIktCSmJV+/fHkFYZpS/5/hq6vX1tt7oUrYhDWJRZIHB69e/dy35OerVwcHYnOC8vL/XlhqADVl9UUAAAAASUVORK5CYII=" />
                <div class="uk-margin-top"></div>
                <div id="name" class="uk-text-truncate">Èrik Campobadal</div>
                <div id="email" class="uk-text-truncate">ConsoleTVs@gmail.com</div>
                <span id="status" data-enabled="true" data-online-text="Online" data-away-text="Away"
                    data-interval="10000" class="uk-margin-top uk-label uk-label-success"></span>
            </div>
            <br />
        </center>
        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: home"></span> Home</a></li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent">
            <a href="#"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Pembayaran SPP</a>
                <ul class="uk-nav-sub">
                <li><a href="{{route('Semua.index')}}"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Data Pembayaran SPP</a></li>
                <li><a href="{{route('Approve.index')}}"><span class="uk-margin-small-right" uk-icon="icon: check"></span> Approve Pembayaran SPP</a></li>
                <li><a href="{{route('Reject.index')}}"><span class="uk-margin-small-right" uk-icon="icon: close"></span> Reject Pembayaran SPP</a></li>
                <li><a href="{{route('Status.index')}}"><span class="uk-margin-small-right" uk-icon="icon: future"></span> Status Pembayaran SPP</a></li>
                <li><a href="{{route('Draft.index')}}"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Draft Pembayaran SPP</a></li>

                </ul>
            </li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent">
            <a href="#"><span class="uk-margin-small-right" uk-icon="icon: database"></span> Master Data</a>
                <ul class="uk-nav-sub">
                <li><a href="{{route('siswa.index')}}"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Data Siswa</a></li>
                <li><a href="{{route('karyawan.index')}}"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Data Karyawan</a></li>
                <li><a href="{{route('mp.index')}}"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Manajemen Password</a></li>
                <li><a href="{{route('role.index')}}"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Role</a></li>
                <li><a href="{{route('kelas.index')}}"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Kelas</a></li>
                <li><a href="{{route('jurusan.index')}}"><span class="uk-margin-small-right" uk-icon="icon: folder"></span> Jurusan</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default" style="padding: 2vh !important">
            <div class="uk-container uk-container-large">
                <h3>@if(View::hasSection('app-title')) @yield('app-title') @else {{'Dashboard'}} @endif</h3>
            </div>
        </div>
           <div class="uk-container uk-container-large uk-align-center">
           @yield('body')
           </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"
        integrity="sha256-UGwvyUFH6Qqn0PSyQVw4q3vIX0wV1miKTracNJzAWPc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.min.js"
        integrity="sha256-rqEXy4JTnKZom8mLVQpvni3QHbynfjPmPxQVsPZgmJY=" crossorigin="anonymous"></script>
    <script src="{{asset('js/notyf.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/status.js')}}"></script>
    <script src="{{asset('js/notification.js')}}"></script>
    @yield('javascript')

</body>

</html>
