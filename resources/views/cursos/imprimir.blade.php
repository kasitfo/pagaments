<html>

    <head>
        <style>

            header {
                position: fixed;
                top: 0mm;
                left: 0mm;
                right: 0mm;
                height: 55mm;
                /*                background-color: #00f;   */
            }

            footer {
                position: fixed;
                left: 0mm;
                bottom: -10mm;
                right: 0mm;
                height: 40mm;
                margin-top: 10mm;
                /*                background-color: #f00;   */
            }

            .page:after {
                content: counter(page);
            }

            body {
                left: 0mm;
                right: 0mm;
            }

            #cuerpo {
                position: relative;
                top: 70mm;
                height: 170mm;
                width: 186mm;
                left: 0mm;
                margin-bottom: 20mm;
                /*
                                border-left: 2px solid black;
                                border-right: 2px solid black;
                                border-bottom: 2px solid black;
                                background-color: #0f0;
                */
            }

            hr {
                page-break-before: always;
                border: none;
                margin: 0;
                padding: 0;
            }

        </style>
    </head>

    <body>

        <header>

            <div style="position:absolute; top:0mm; left:0mm; ">
                <img width="87" height="84" src="{{ url('img/logo_2.png')}}">
            </div>

            <div style="position:absolute; top:0mm; left:110mm; font-size:10; text-align:center;">
                Carrer Jaume Pallarès, 0<br>
                43820 Calafell, Tarragona<br>
                Telèfon: 977 69 57 11<br>
                Email: e3007257@xtec.cat
            </div>

            <div style="position:absolute; top:30mm; left:0mm; font-size:xx-large;">
                <span style="font-weight: bold;">&nbsp;CURSOS&nbsp;</span>                
            </div>  

            <div style="position:absolute; top:60mm; left:0mm; font-size:10; border-left: 2px solid black; border-top: 2px solid black; border-right: 2px solid black;">
                <table>
                    <thead>
                        <tr style="background-color: #ddd;">
                            <th style="width:160mm; padding-top: 2mm; padding-bottom: 2mm;">Curs</th>
                        </tr>            
                    </thead>
                </table>
            </div>

        </header>

        <div id="cuerpo">

            <table>
                <tbody style="font-size:10;">
                    @foreach( $cursos as $curs )
                    <tr>
                        <td style="left:0mm; width:160mm; border-bottom: 1px solid #ddd; padding-top:2mm; padding-bottom:2mm;">{{$curs->curs}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <footer>

        </footer> 

    </body>

</html>