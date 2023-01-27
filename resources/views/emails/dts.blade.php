@component('mail::message')
# Confirmation of Document

Hello,

Please be informed that your document has been successfully uploaded on DTS Website. To keep track on your document, visit <a>http://dts.nmis.gov.ph </a> and input this Document Tracking No. : <br>

<b>{{ $tracking_number }}</b><br>


Thanks!<br>
<b>NMIS Team</b>
@endcomponent
