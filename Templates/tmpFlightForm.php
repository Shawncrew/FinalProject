
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form-inline" action="/Project4/" method="POST">
			<table class="table">
				<tr>
					<td> 
						<label for="departureDate">Departure Date</label>
		       			<input type="Date" class="form-control" id="departureDate" placeholder="Depart Date">
		       		</td>
		       		<td>
		       			<label for="returnDate">Return Date</label>
		        		<input type="Date" class="form-control" id="returnDate" placeholder="Return Date">
		       		</td>
				</tr>
				<tr>
					<td>
						<label for="origin">Origin</label>
		        		<input type="text" class="form-control" id="origin" placeholder="ATL">
					</td>
					<td>
						<label for="destination">Destination</label>
		        		<input type="text" class="form-control" id="destination" placeholder="Airport Code">
					</td>
				</tr>
				<tr>
					<td>
					 <button type="submit" class="btn btn-primary">Check Flights</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div class="col-md-1 col-md-offset-1">
		<form class="form-inline" action="/Project4/CarReservation" method="POST">
		 	<button type="submit" class="btn btn-primary">Next: Car Reservations -></button>
		</form>
	</div>	
</div>

