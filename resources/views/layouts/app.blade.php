<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyStore') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/own.css') }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'MyStore') }}
                <img width="20" height="20" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBhdGggc3R5bGU9ImZpbGw6I0I5Nzg1RjsiIGQ9Ik00OTQuMzQ1LDQ2My40NDhIMTcuNjU1VjQ4LjU1MmMwLTQuODc1LDMuOTUzLTguODI4LDguODI4LTguODI4aDQ1OS4wMzQgIGM0Ljg3NSwwLDguODI4LDMuOTUzLDguODI4LDguODI4VjQ2My40NDh6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNBQTY0NTU7IiBkPSJNNDk0LjM0NSwxODAuMjA1Yy0xLjgwOSwwLjQ1LTMuNjcsMC43Ni01LjYxOCwwLjc2Yy0xMi44NTMsMC0yMy4yNzMtMTAuNDItMjMuMjczLTIzLjI3MyAgYzAsMTIuODUyLTEwLjQyLDIzLjI3My0yMy4yNzMsMjMuMjczYy0xMi44NTMsMC0yMy4yNzMtMTAuNDItMjMuMjczLTIzLjI3M2MwLDEyLjg1Mi0xMC40MTksMjMuMjczLTIzLjI3MywyMy4yNzMgIGMtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzNjMCwxMi44NTItMTAuNDIsMjMuMjczLTIzLjI3MywyMy4yNzNzLTIzLjI3My0xMC40Mi0yMy4yNzMtMjMuMjczICBjMCwxMi44NTItMTAuNDIsMjMuMjczLTIzLjI3MywyMy4yNzNjLTEyLjg1MywwLTIzLjI3My0xMC40Mi0yMy4yNzMtMjMuMjczYzAsMTIuODUyLTEwLjQxOSwyMy4yNzMtMjMuMjczLDIzLjI3MyAgcy0yMy4yNzMtMTAuNDItMjMuMjczLTIzLjI3M2MwLDEyLjg1Mi0xMC40MiwyMy4yNzMtMjMuMjczLDIzLjI3M2MtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzMgIGMwLDEyLjg1Mi0xMC40MTksMjMuMjczLTIzLjI3MywyMy4yNzNjLTEyLjg1MywwLTIzLjI3My0xMC40Mi0yMy4yNzMtMjMuMjczYzAsMTIuODUyLTEwLjQyLDIzLjI3My0yMy4yNzMsMjMuMjczICBjLTEyLjg1MywwLTIzLjI3My0xMC40Mi0yMy4yNzMtMjMuMjczYzAsMTIuODUyLTEwLjQyLDIzLjI3My0yMy4yNzMsMjMuMjczcy0yMy4yNzMtMTAuNDItMjMuMjczLTIzLjI3MyAgYzAsMTIuODUyLTEwLjQxOSwyMy4yNzMtMjMuMjczLDIzLjI3M2MtMS45NDgsMC0zLjgwOS0wLjMxLTUuNjE4LTAuNzZ2MTcuODQ4YzEuODU0LDAuMjU3LDMuNjk0LDAuNTY4LDUuNjE4LDAuNTY4ICBjOC42MzksMCwxNi42NjEtMi42OSwyMy4yNzMtNy4yNzdjNi42MTQsNC41ODYsMTQuNjM1LDcuMjc2LDIzLjI3NSw3LjI3NmM4LjYzOSwwLDE2LjY2MS0yLjY5LDIzLjI3My03LjI3NyAgYzYuNjEyLDQuNTg3LDE0LjYzNCw3LjI3NywyMy4yNzMsNy4yNzdzMTYuNjYxLTIuNjksMjMuMjczLTcuMjc3YzYuNjEyLDQuNTg3LDE0LjYzNCw3LjI3NywyMy4yNzMsNy4yNzcgIGM4LjYzOSwwLDE2LjY2MS0yLjY5LDIzLjI3My03LjI3N2M2LjYxMiw0LjU4NywxNC42MzQsNy4yNzcsMjMuMjczLDcuMjc3YzguNjM5LDAsMTYuNjYxLTIuNjksMjMuMjczLTcuMjc3ICBjNi42MTEsNC41ODcsMTQuNjMzLDcuMjc3LDIzLjI3Miw3LjI3N3MxNi42NjEtMi42OSwyMy4yNzMtNy4yNzdjNi42MTIsNC41ODcsMTQuNjM0LDcuMjc3LDIzLjI3Myw3LjI3NyAgYzguNjM5LDAsMTYuNjYxLTIuNjksMjMuMjczLTcuMjc3YzYuNjEyLDQuNTg3LDE0LjYzNCw3LjI3NywyMy4yNzMsNy4yNzdjOC42MzksMCwxNi42NjEtMi42OSwyMy4yNzMtNy4yNzcgIGM2LjYxMiw0LjU4NywxNC42MzQsNy4yNzcsMjMuMjczLDcuMjc3czE2LjY2MS0yLjY5LDIzLjI3My03LjI3N2M2LjYxMiw0LjU4NywxNC42MzQsNy4yNzcsMjMuMjczLDcuMjc3ICBjOC42NCwwLDE2LjY2MS0yLjY5LDIzLjI3My03LjI3N2M2LjYxMiw0LjU4NywxNC42MzQsNy4yNzcsMjMuMjczLDcuMjc3YzEuOTIzLDAsMy43NjQtMC4zMSw1LjYxOC0wLjU2OHYtMTcuODQ3SDQ5NC4zNDV6Ii8+CjxyZWN0IHg9IjYxLjc5MyIgeT0iMjE2LjI3NiIgc3R5bGU9ImZpbGw6I0I0RTFGQTsiIHdpZHRoPSIyNDcuMTcyIiBoZWlnaHQ9IjE1OC44OTciLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6I0RBRjBGRDsiIHBvaW50cz0iMjY0LjgyOCwzNjYuMzQ1IDI0Ny4xNzIsMzY2LjM0NSAxNDEuMjQxLDIyNS4xMDMgMTU4Ljg5NywyMjUuMTAzICIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEMjU1NUE7IiBkPSJNMjA5LjQ1NCwxODAuOTY2TDIwOS40NTQsMTgwLjk2NmMtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzN2LTIwLjg2NWg0Ni41NDZ2MjAuODY1ICAgQzIzMi43MjcsMTcwLjU0NiwyMjIuMzA3LDE4MC45NjYsMjA5LjQ1NCwxODAuOTY2eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0QyNTU1QTsiIGQ9Ik0zMDIuNTQ2LDE4MC45NjZMMzAyLjU0NiwxODAuOTY2Yy0xMi44NTMsMC0yMy4yNzMtMTAuNDItMjMuMjczLTIzLjI3M3YtMjAuODY1aDQ2LjU0NnYyMC44NjUgICBDMzI1LjgxOCwxNzAuNTQ2LDMxNS4zOTksMTgwLjk2NiwzMDIuNTQ2LDE4MC45NjZ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDI1NTVBOyIgZD0iTTExNi4zNjQsMTgwLjk2NkwxMTYuMzY0LDE4MC45NjZjLTEyLjg1MywwLTIzLjI3My0xMC40Mi0yMy4yNzMtMjMuMjczdi0yMC44NjVoNDYuNTQ2djIwLjg2NSAgIEMxMzkuNjM2LDE3MC41NDYsMTI5LjIxNywxODAuOTY2LDExNi4zNjQsMTgwLjk2NnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEMjU1NUE7IiBkPSJNMjMuMjczLDE4MC45NjZMMjMuMjczLDE4MC45NjZDMTAuNDIsMTgwLjk2NiwwLDE3MC41NDYsMCwxNTcuNjkzdi0yMC44NjVoNDYuNTQ2djIwLjg2NSAgIEM0Ni41NDYsMTcwLjU0NiwzNi4xMjYsMTgwLjk2NiwyMy4yNzMsMTgwLjk2NnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEMjU1NUE7IiBkPSJNMzk1LjYzNiwxODAuOTY2TDM5NS42MzYsMTgwLjk2NmMtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzN2LTIwLjg2NWg0Ni41NDZ2MjAuODY1ICAgQzQxOC45MDksMTcwLjU0Niw0MDguNDksMTgwLjk2NiwzOTUuNjM2LDE4MC45NjZ6Ii8+CjwvZz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojQzdDRkUyOyIgZD0iTTE2Mi45MDksMTgwLjk2NkwxNjIuOTA5LDE4MC45NjZjLTEyLjg1MywwLTIzLjI3My0xMC40Mi0yMy4yNzMtMjMuMjczdi0yMC44NjVoNDYuNTQ2djIwLjg2NSAgIEMxODYuMTgyLDE3MC41NDYsMTc1Ljc2MywxODAuOTY2LDE2Mi45MDksMTgwLjk2NnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNDN0NGRTI7IiBkPSJNMzQ5LjA5MSwxODAuOTY2TDM0OS4wOTEsMTgwLjk2NmMtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzN2LTIwLjg2NWg0Ni41NDZ2MjAuODY1ICAgQzM3Mi4zNjMsMTcwLjU0NiwzNjEuOTQ0LDE4MC45NjYsMzQ5LjA5MSwxODAuOTY2eiIvPgo8L2c+CjxwYXRoIHN0eWxlPSJmaWxsOiNEMjU1NUE7IiBkPSJNNDg4LjcyNywxODAuOTY2TDQ4OC43MjcsMTgwLjk2NmMtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzN2LTIwLjg2NUg1MTJ2MjAuODY1ICBDNTEyLDE3MC41NDYsNTAxLjU4LDE4MC45NjYsNDg4LjcyNywxODAuOTY2eiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNDN0NGRTI7IiBkPSJNNDQyLjE4MiwxODAuOTY2TDQ0Mi4xODIsMTgwLjk2NmMtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzN2LTIwLjg2NWg0Ni41NDZ2MjAuODY1ICAgQzQ2NS40NTQsMTcwLjU0Niw0NTUuMDM0LDE4MC45NjYsNDQyLjE4MiwxODAuOTY2eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0M3Q0ZFMjsiIGQ9Ik02OS44MTgsMTgwLjk2Nkw2OS44MTgsMTgwLjk2NmMtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzN2LTIwLjg2NWg0Ni41NDZ2MjAuODY1ICAgQzkzLjA5MSwxNzAuNTQ2LDgyLjY3MSwxODAuOTY2LDY5LjgxOCwxODAuOTY2eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0M3Q0ZFMjsiIGQ9Ik0yNTYsMTgwLjk2NkwyNTYsMTgwLjk2NmMtMTIuODUzLDAtMjMuMjczLTEwLjQyLTIzLjI3My0yMy4yNzN2LTIwLjg2NWg0Ni41NDZ2MjAuODY1ICAgQzI3OS4yNzMsMTcwLjU0NiwyNjguODUzLDE4MC45NjYsMjU2LDE4MC45NjZ6Ii8+CjwvZz4KPGc+Cgk8cG9seWdvbiBzdHlsZT0iZmlsbDojRkY2NDY0OyIgcG9pbnRzPSIyMzIuNzI3LDEzNi44MjggMTg2LjE4MiwxMzYuODI4IDE5MC45OTcsNjYuMjA3IDIzNC4zMzMsNjYuMjA3ICAiLz4KCTxwb2x5Z29uIHN0eWxlPSJmaWxsOiNGRjY0NjQ7IiBwb2ludHM9IjMyNS44MTgsMTM2LjgyOCAyNzkuMjczLDEzNi44MjggMjc3LjY2Nyw2Ni4yMDcgMzIxLjAwMyw2Ni4yMDcgICIvPgoJPHBvbHlnb24gc3R5bGU9ImZpbGw6I0ZGNjQ2NDsiIHBvaW50cz0iMTM5LjYzNiwxMzYuODI4IDkzLjA5MSwxMzYuODI4IDEwNC4zMjYsNjYuMjA3IDE0Ny42NjEsNjYuMjA3ICAiLz4KCTxwb2x5Z29uIHN0eWxlPSJmaWxsOiNGRjY0NjQ7IiBwb2ludHM9IjQ2LjU0NiwxMzYuODI4IDAsMTM2LjgyOCAxNy42NTUsNjYuMjA3IDYwLjk5MSw2Ni4yMDcgICIvPgoJPHBvbHlnb24gc3R5bGU9ImZpbGw6I0ZGNjQ2NDsiIHBvaW50cz0iNDE4LjkwOSwxMzYuODI4IDM3Mi4zNjMsMTM2LjgyOCAzNjQuMzM5LDY2LjIwNyA0MDcuNjczLDY2LjIwNyAgIi8+CjwvZz4KPGc+Cgk8cG9seWdvbiBzdHlsZT0iZmlsbDojRUZGMkZBOyIgcG9pbnRzPSIxODYuMTgyLDEzNi44MjggMTM5LjYzNiwxMzYuODI4IDE0Ny42NjEsNjYuMjA3IDE5MC45OTcsNjYuMjA3ICAiLz4KCTxwb2x5Z29uIHN0eWxlPSJmaWxsOiNFRkYyRkE7IiBwb2ludHM9IjM3Mi4zNjMsMTM2LjgyOCAzMjUuODE4LDEzNi44MjggMzIxLjAwMyw2Ni4yMDcgMzY0LjMzOSw2Ni4yMDcgICIvPgo8L2c+Cjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNGRjY0NjQ7IiBwb2ludHM9IjUxMiwxMzYuODI4IDQ2NS40NTQsMTM2LjgyOCA0NTEuMDA5LDY2LjIwNyA0OTQuMzQ1LDY2LjIwNyAiLz4KPGc+Cgk8cG9seWdvbiBzdHlsZT0iZmlsbDojRUZGMkZBOyIgcG9pbnRzPSI0NjUuNDU0LDEzNi44MjggNDE4LjkwOSwxMzYuODI4IDQwNy42NzMsNjYuMjA3IDQ1MS4wMDksNjYuMjA3ICAiLz4KCTxwb2x5Z29uIHN0eWxlPSJmaWxsOiNFRkYyRkE7IiBwb2ludHM9IjkzLjA5MSwxMzYuODI4IDQ2LjU0NiwxMzYuODI4IDYwLjk5MSw2Ni4yMDcgMTA0LjMyNiw2Ni4yMDcgICIvPgoJPHBvbHlnb24gc3R5bGU9ImZpbGw6I0VGRjJGQTsiIHBvaW50cz0iMjc5LjI3MywxMzYuODI4IDIzMi43MjcsMTM2LjgyOCAyMzQuMzMzLDY2LjIwNyAyNzcuNjY3LDY2LjIwNyAgIi8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0M3Q0ZFMjsiIGQ9Ik01MDMuMTcyLDQ3Mi4yNzZIOC44MjhjLTQuODc1LDAtOC44MjgtMy45NTMtOC44MjgtOC44MjhsMCwwYzAtNC44NzUsMy45NTMtOC44MjgsOC44MjgtOC44MjggIGg0OTQuMzQ1YzQuODc1LDAsOC44MjgsMy45NTMsOC44MjgsOC44MjhsMCwwQzUxMiw0NjguMzIzLDUwOC4wNDcsNDcyLjI3Niw1MDMuMTcyLDQ3Mi4yNzZ6Ii8+CjxnIHN0eWxlPSJvcGFjaXR5OjAuOTc7Ij4KCTxyZWN0IHg9IjE3LjY1NSIgeT0iNDM2Ljk2NiIgc3R5bGU9ImZpbGw6I0FGQjlEMjsiIHdpZHRoPSI0NzYuNjkiIGhlaWdodD0iMTcuNjU1Ii8+CjwvZz4KPHJlY3QgeD0iMTcuNjU1IiB5PSI0MDEuNjU1IiBzdHlsZT0iZmlsbDojQUE2NDU1OyIgd2lkdGg9IjQ3Ni42OSIgaGVpZ2h0PSIzNS4zMSIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiM1QjVENkU7IiBkPSJNMzAwLjEzOCwyMjUuMTAzdjE0MS4yNDFINzAuNjIxVjIyNS4xMDNIMzAwLjEzOCBNMzA4Ljk2NiwyMDcuNDQ4SDYxLjc5MyAgIGMtNC44NzUsMC04LjgyOCwzLjk1My04LjgyOCw4LjgyOHYxNTguODk3YzAsNC44NzUsMy45NTMsOC44MjgsOC44MjgsOC44MjhoMjQ3LjE3MmM0Ljg3NSwwLDguODI4LTMuOTUzLDguODI4LTguODI4VjIxNi4yNzYgICBDMzE3Ljc5MywyMTEuNDAxLDMxMy44NDEsMjA3LjQ0OCwzMDguOTY2LDIwNy40NDhMMzA4Ljk2NiwyMDcuNDQ4eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzVCNUQ2RTsiIGQ9Ik00NTAuMjA3LDIwNy40NDhoLTg4LjI3NmMtNC44NzUsMC04LjgyOCwzLjk1My04LjgyOCw4LjgyOHYyMjAuNjloMTA1LjkzMXYtMjIwLjY5ICAgQzQ1OS4wMzQsMjExLjQwMSw0NTUuMDgyLDIwNy40NDgsNDUwLjIwNywyMDcuNDQ4eiIvPgo8L2c+CjxyZWN0IHg9IjM3MC43NTkiIHk9IjIyNS4xMDMiIHN0eWxlPSJmaWxsOiNCNEUxRkE7IiB3aWR0aD0iNzAuNjIxIiBoZWlnaHQ9IjE0MS4yNDEiLz4KPHJlY3QgeD0iNzAuNjIxIiB5PSIyMjUuMTAzIiBzdHlsZT0iZmlsbDojQTBEMkYwOyIgd2lkdGg9IjIyOS41MTciIGhlaWdodD0iMTcuNjU1Ii8+CjxyZWN0IGlkPSJTVkdDbGVhbmVySWRfMCIgeD0iMzcwLjc1OSIgeT0iMjI1LjEwMyIgc3R5bGU9ImZpbGw6I0EwRDJGMDsiIHdpZHRoPSI3MC42MjEiIGhlaWdodD0iMTcuNjU1Ii8+Cjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNBMEQyRjA7IiBwb2ludHM9IjIyOS41MTcsMzY2LjM0NSAxOTQuMjA3LDM2Ni4zNDUgODguMjc2LDIyNS4xMDMgMTIzLjU4NiwyMjUuMTAzICIvPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojQjRFMUZBOyIgcG9pbnRzPSIxNzIuMTM4LDI0Mi43NTkgMTU4Ljg5NywyMjUuMTAzIDE0MS4yNDEsMjI1LjEwMyAxNTQuNDgzLDI0Mi43NTkgIi8+Cjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNEQUYwRkQ7IiBwb2ludHM9IjQ0MS4zNzksMjk1LjcyNCAzODguNDE0LDIyNS4xMDMgMzcwLjc1OSwyMjUuMTAzIDQ0MS4zNzksMzE5LjI2NSAiLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6I0I0RTFGQTsiIHBvaW50cz0iNDAxLjY1NSwyNDIuNzU5IDM4OC40MTQsMjI1LjEwMyAzNzAuNzU5LDIyNS4xMDMgMzg0LDI0Mi43NTkgIi8+CjxnPgoJPHJlY3QgaWQ9IlNWR0NsZWFuZXJJZF8wXzFfIiB4PSIzNzAuNzU5IiB5PSIyMjUuMTAzIiBzdHlsZT0iZmlsbDojQTBEMkYwOyIgd2lkdGg9IjcwLjYyMSIgaGVpZ2h0PSIxNy42NTUiLz4KPC9nPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojREFGMEZEOyIgcG9pbnRzPSI0NDEuMzc5LDI5NS43MjQgMzg4LjQxNCwyMjUuMTAzIDM3MC43NTksMjI1LjEwMyA0NDEuMzc5LDMxOS4yNjUgIi8+Cjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNBMEQyRjA7IiBwb2ludHM9IjM3MC43NTksMjQ4LjY0NCAzNzAuNzU5LDI5NS43MjQgNDIzLjcyNCwzNjYuMzQ1IDQ0MS4zNzksMzY2LjM0NSA0NDEuMzc5LDM0Mi44MDQgIi8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
            </a>
            @if( Auth::check() )
                <a class="navbar-brand" href="{{ url('/productos/create') }}">
                    {{ 'Añadir Producto' }}
                </a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <a href=""><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4Ni41NjkgNDg2LjU2OSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDg2LjU2OSA0ODYuNTY5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPHBhdGggZD0iTTE0Ni4wNjksMzIwLjM2OWgyNjguMWMzMC40LDAsNTUuMi0yNC44LDU1LjItNTUuMnYtMTEyLjhjMC0wLjEsMC0wLjMsMC0wLjRjMC0wLjMsMC0wLjUsMC0wLjhjMC0wLjIsMC0wLjQtMC4xLTAuNiAgIGMwLTAuMi0wLjEtMC41LTAuMS0wLjdzLTAuMS0wLjQtMC4xLTAuNmMtMC4xLTAuMi0wLjEtMC40LTAuMi0wLjdjLTAuMS0wLjItMC4xLTAuNC0wLjItMC42Yy0wLjEtMC4yLTAuMS0wLjQtMC4yLTAuNiAgIGMtMC4xLTAuMi0wLjItMC40LTAuMy0wLjdjLTAuMS0wLjItMC4yLTAuNC0wLjMtMC41Yy0wLjEtMC4yLTAuMi0wLjQtMC4zLTAuNmMtMC4xLTAuMi0wLjItMC4zLTAuMy0wLjVjLTAuMS0wLjItMC4zLTAuNC0wLjQtMC42ICAgYy0wLjEtMC4yLTAuMi0wLjMtMC40LTAuNWMtMC4xLTAuMi0wLjMtMC4zLTAuNC0wLjVzLTAuMy0wLjMtMC40LTAuNXMtMC4zLTAuMy0wLjQtMC40Yy0wLjItMC4yLTAuMy0wLjMtMC41LTAuNSAgIGMtMC4yLTAuMS0wLjMtMC4zLTAuNS0wLjRjLTAuMi0wLjEtMC40LTAuMy0wLjYtMC40Yy0wLjItMC4xLTAuMy0wLjItMC41LTAuM3MtMC40LTAuMi0wLjYtMC40Yy0wLjItMC4xLTAuNC0wLjItMC42LTAuMyAgIHMtMC40LTAuMi0wLjYtMC4zcy0wLjQtMC4yLTAuNi0wLjNzLTAuNC0wLjEtMC42LTAuMmMtMC4yLTAuMS0wLjUtMC4yLTAuNy0wLjJzLTAuNC0wLjEtMC41LTAuMWMtMC4zLTAuMS0wLjUtMC4xLTAuOC0wLjEgICBjLTAuMSwwLTAuMi0wLjEtMC40LTAuMWwtMzM5LjgtNDYuOXYtNDcuNGMwLTAuNSwwLTEtMC4xLTEuNGMwLTAuMSwwLTAuMi0wLjEtMC40YzAtMC4zLTAuMS0wLjYtMC4xLTAuOWMtMC4xLTAuMy0wLjEtMC41LTAuMi0wLjggICBjMC0wLjItMC4xLTAuMy0wLjEtMC41Yy0wLjEtMC4zLTAuMi0wLjYtMC4zLTAuOWMwLTAuMS0wLjEtMC4zLTAuMS0wLjRjLTAuMS0wLjMtMC4yLTAuNS0wLjQtMC44Yy0wLjEtMC4xLTAuMS0wLjMtMC4yLTAuNCAgIGMtMC4xLTAuMi0wLjItMC40LTAuNC0wLjZjLTAuMS0wLjItMC4yLTAuMy0wLjMtMC41cy0wLjItMC4zLTAuMy0wLjVzLTAuMy0wLjQtMC40LTAuNmMtMC4xLTAuMS0wLjItMC4yLTAuMy0wLjMgICBjLTAuMi0wLjItMC40LTAuNC0wLjYtMC42Yy0wLjEtMC4xLTAuMi0wLjItMC4zLTAuM2MtMC4yLTAuMi0wLjQtMC40LTAuNy0wLjZjLTAuMS0wLjEtMC4zLTAuMi0wLjQtMC4zYy0wLjItMC4yLTAuNC0wLjMtMC42LTAuNSAgIGMtMC4zLTAuMi0wLjYtMC40LTAuOC0wLjVjLTAuMS0wLjEtMC4yLTAuMS0wLjMtMC4yYy0wLjQtMC4yLTAuOS0wLjQtMS4zLTAuNmwtNzMuNy0zMWMtNi45LTIuOS0xNC44LDAuMy0xNy43LDcuMiAgIHMwLjMsMTQuOCw3LjIsMTcuN2w2NS40LDI3LjZ2NjEuMnY5Ljd2NzQuNHY2Ni41djg0YzAsMjgsMjEsNTEuMiw0OC4xLDU0LjdjLTQuOSw4LjItNy44LDE3LjgtNy44LDI4YzAsMzAuMSwyNC41LDU0LjUsNTQuNSw1NC41ICAgczU0LjUtMjQuNSw1NC41LTU0LjVjMC0xMC0yLjctMTkuNS03LjUtMjcuNWgxMjEuNGMtNC44LDguMS03LjUsMTcuNS03LjUsMjcuNWMwLDMwLjEsMjQuNSw1NC41LDU0LjUsNTQuNXM1NC41LTI0LjUsNTQuNS01NC41ICAgcy0yNC41LTU0LjUtNTQuNS01NC41aC0yNTVjLTE1LjYsMC0yOC4yLTEyLjctMjguMi0yOC4ydi0zNi42QzEyNi4wNjksMzE3LjU2OSwxMzUuNzY5LDMyMC4zNjksMTQ2LjA2OSwzMjAuMzY5eiBNMjEzLjI2OSw0MzEuOTY5ICAgYzAsMTUuMi0xMi40LDI3LjUtMjcuNSwyNy41cy0yNy41LTEyLjQtMjcuNS0yNy41czEyLjQtMjcuNSwyNy41LTI3LjVTMjEzLjI2OSw0MTYuNzY5LDIxMy4yNjksNDMxLjk2OXogTTQyOC42NjksNDMxLjk2OSAgIGMwLDE1LjItMTIuNCwyNy41LTI3LjUsMjcuNXMtMjcuNS0xMi40LTI3LjUtMjcuNXMxMi40LTI3LjUsMjcuNS0yNy41UzQyOC42NjksNDE2Ljc2OSw0MjguNjY5LDQzMS45Njl6IE00MTQuMTY5LDI5My4zNjloLTI2OC4xICAgYy0xNS42LDAtMjguMi0xMi43LTI4LjItMjguMnYtNjYuNXYtNzQuNHYtNWwzMjQuNSw0NC43djEwMS4xQzQ0Mi4zNjksMjgwLjc2OSw0MjkuNjY5LDI5My4zNjksNDE0LjE2OSwyOTMuMzY5eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></a>
                <ul class="navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Identificarse</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registrarse</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ url('/profile') }}" class="dropdown-item">Perfil</a>
                                <a href="{{ url('/profile/edit') }}" class="dropdown-item">Editar</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Desconectarse
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>

                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquerymask.js') }}" defer></script>
<script src="{{ asset('js/draggable.js') }}" defer></script>
<script src="{{ asset('js/autocomplete.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js" type="text/javascript"></script>
@stack('scripts')
</body>
</html>
