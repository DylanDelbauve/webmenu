<!DOCTYPE html>
<html>

<head>
	<title>PDF</title>
	<?= $this->Html->css('bootstrap.css', ['fullBase' => true]) ?>
	<?= $this->fetch('css') ?>
</head>

<body>
	<h1>Menu du <?= h($menu->date) ?></h1>

	<div class="container">
		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Nom plat</th>
						<th scope="col">Type de plat</th>
						<th scope="col">Allergènes</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($menu->dishes as $dish) : ?>
						<tr>
							<td><?= h($dish->name) ?></td>
							<td><?= h($dish->dish_type->name) ?></td>
							<td>
								<?php foreach ($dish->allergens as $allergen) : ?>
									<?= h($allergen->name) ?>
								<?php endforeach; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>