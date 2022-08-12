{{--  <select name="city_id">  --}}
    @if (isset($order))
    <option value="{{ $order->city_id }}"  selected >{{ $order->city_id }}</option>
    @endif
    <option value="cairo">cairo</option>
    <option value="Ad Daqahliyah">Ad Daqahliyah</option>
    <option value="Al Bahr al Ahmar">Al Bahr al Ahmar</option>
    <option value="Al Buhayrah">Al Buhayrah</option>
    <option value="Al Fayyum">Al Fayyum</option>
    <option value="Al Gharbiyah">Al Gharbiyah</option>
    <option value="Al Iskandariyah">Al Iskandariyah</option>
    <option value="Al Isma'iliyah">Al Isma'iliyah</option>
    <option value="Al Jizah">Al Jizah</option>
    <option value="Al Minufiyah">Al Minufiyah</option>
    <option value="Al Minya">Al Minya</option>
    <option value="Alexandria">Alexandria</option>
    <option value="As Suways">As Suways</option>
    <option value="Ash Sharqiyah">Ash Sharqiyah</option>
    <option value="Aswan">Aswan</option>
    <option value="Asyut">Asyut</option>
    <option value="Bani Suwayf">Bani Suwayf</option>
    <option value="Dumyat">Dumyat</option>
    <option value="Janub Sina'">Janub Sina'</option>
    <option value="Kafr ash Shaykh">Kafr ash Shaykh</option>
    <option value="Luxor">Luxor</option>
    <option value="Matruh">Matruh</option>
    <option value="Port Said">Port Said</option>
    <option value="Qena">Qena</option>
    
{{--  </select>  --}}