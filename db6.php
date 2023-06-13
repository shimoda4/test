<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>テンプレ</title>
	</head>
	<body>

		<?php

			require_once '_database_conf.php';
			require_once '_h.php';

			try
			{

				$pro_code='4';

				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='DELETE FROM table3 WHERE code = :bangou';
				$stmt=$db->prepare($sql);
				$stmt->bindValue(':bangou', $pro_code, PDO::PARAM_INT);
				$stmt->execute();

				$db=null;		

			}
			catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>

	</body>
</html>