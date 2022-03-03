<strong>სახელი და გვარი:</strong> {{ $name }}
<br>
<strong>საკონტაქტო ინფორმაცია:</strong> {{ $contact }}
<br>
<strong>როდის ჩამოფრინდა:</strong> {{ \Carbon\Carbon::parse($arrive)->format('d M, Y') }}
<br>
<strong>როდის მიფრინავს:</strong> {{ \Carbon\Carbon::parse($departure)->format('d M, Y') }}
<br>
<strong>სად იმყოფება ამჟამად:</strong> {{ $location }}
@if($comment)
<br>
<strong>დამატებითი ინფორმაცია:</strong> {{ $comment }}
@endif
<br><br>
<strong>ატვირთული დოკუმენტაცია:</strong>
<br>
<strong>პასპორტი:</strong> <a href="{{ config('app.url') . '/storage/' . $passport }}" download>{{ config('app.url') . '/storage/' . $passport }}</a>
<br>
<strong>პასპორტი ჩამოსვლის თარიღით:</strong> <a href="{{ config('app.url') . '/storage/' . $passport_arrival }}" download>{{ config('app.url') . '/storage/' . $passport_arrival }}</a>