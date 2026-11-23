@php
    $comments = [];
    if (is_array($komentar) && $single_artikel['boleh_komentar']) {
        $comments = [];

        foreach ($komentar as $comment) {
            if ($comment['is_archived'] != 1) {
                $comments[] = $comment;
            }
        }
        $comments = array_reverse($comments);
    }
    $notif = session('notif');
@endphp

@if (count($comments) > 0)
    <div class="contact_bottom">
        <div class="box-body">
            @foreach ($comments as $data)
                <table class="table table-bordered table-striped dataTable table-hover">
                    <thead class="bg-gray disabled color-palette">
                        <tr>
                            <th colspan="2" style="text-align: left;"><i class="fa fa-comment"></i> {{ $data['pengguna']['nama'] }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <font color='green'><small>{{ tgl_indo2($data['tgl_upload']) }}</small></font><br />{{ $data['komentar'] }}
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"></td>
                            <td>
                                @if (count($data['children']) > 0)
                                    @foreach ($data['children'] as $children)
                                        <table class="table table-bordered table-striped dataTable table-hover">
                                            <thead class="bg-gray disabled color-palette">
                                                <tr>
                                                    <th style="text-align: left;"><i class="fa fa-comment"></i> {{ $children['pengguna']['nama'] }}
                                                        <code>({{ $children['pengguna']['level'] }})</code>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <font color='green'><small>{{ tgl_indo2($children['tgl_upload']) }}</small>
                                                        </font><br />{{ $children['komentar'] }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endif

<div class="form-group group-komentar" id="kolom-komentar">
    @if ($single_artikel['boleh_komentar'] == 1)
        <div class="box box-default">
            <div class="box-header">
                <h2 class="box-title">Kirim Komentar</h2>
            </div>
            <hr />
            @php
                $label = $notif['status'] == -1 ? 'label-danger' : 'label-info';
            @endphp
            @if ($notif)
                <div class="box-header {{ $label }}">{{ $notif['pesan'] }}</div>
            @endif
            <p style="padding: 10px 15px 0; font-size: 12px;">Komentar baru terbit setelah disetujui oleh admin</p>
            <div class="contact_bottom">
                <form class="contact_form form-komentar" id="validasi" name="form" action="{{ ci_route("add_comment.{$single_artikel['id']}") }}" method="POST" onSubmit="return validasi(this);">
                    <table width="100%">
                        <tr class="komentar nama">
                            <td width="20%">Nama</td>
                            <td>
                                <input class="form-group required" type="text" name="owner" maxlength="50" placeholder="ketik di sini" value="{{ $notif['data']['owner'] }}">
                            </td>
                        </tr>
                        <tr class="komentar alamat">
                            <td>No. Hp</td>
                            <td>
                                <input class="form-group number required" type="text" name="no_hp" maxlength="15" placeholder="ketik di sini" value="{{ $notif['data']['no_hp'] }}">
                            </td>
                        </tr>
                        <tr class="komentar alamat">
                            <td>E-mail</td>
                            <td>
                                <input class="form-group email" type="text" name="email" maxlength="50" placeholder="email@gmail.com" value="{{ $notif['data']['email'] }}">
                            </td>
                        </tr>
                        <tr class="komentar pesan">
                            <td valign="top">Isi Pesan</td>
                            <td>
                                <textarea class="required" name="komentar">{{ $notif['data']['komentar'] }}</textarea>
                            </td>
                        </tr>
                        <tr class="captcha">
                            <td>&nbsp;</td>
                            <td>
                                <div style="display: inline-flex; align-items: center; gap: 5px;">
                                    <a href="#" style="color: #000000;">
                                        <img id="captcha" src="{{ ci_route('captcha') }}" onclick="document.getElementById('captcha').src = '{{ ci_route('captcha') }}?' + Math.random();" alt="CAPTCHA Image" />
                                    </a>
                                    <button type="button" onclick="document.getElementById('captcha').src = '{{ ci_route('captcha') }}?' + Math.random();">🔄</button>
                                    <input type="text" name="captcha_code" class="required" maxlength="6" placeholder="Masukkan kode di atas" />
                                </div>
                            </td>
                        </tr>
                        <tr class="submit">
                            <td>&nbsp;</td>
                            <td><input type="submit" value="Kirim"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    @else
        <span class='info'></span>
    @endif
</div>
