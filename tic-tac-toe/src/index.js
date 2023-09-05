import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";

class Square extends React.Component {
	render() {
		const classNames = ["square"];
		if (this.props.isWinner) {
			classNames.push("winner");
		}

		return (
			<button
				className={classNames.join(" ")}
				onClick={this.props.onClick}
			>
				{this.props.value}
			</button>
		);
	}
}

class Board extends React.Component {
	renderSquare(i) {
		const winnerSquares = calculateWinner(this.props.squares);
		const isWinner = winnerSquares && winnerSquares.includes(i);
		return (
			<Square
				key={i}
				value={this.props.squares[i]}
				onClick={() => this.props.onClick(i)}
				isWinner={isWinner}
			/>
		);
	}

	render() {
		const boardSize = 3;
		const rows = [];
		for (let i = 0; i < boardSize; i++) {
			const row = [];
			for (let j = 0; j < boardSize; j++) {
				const index = i * boardSize + j;
				row.push(this.renderSquare(index));
			}
			rows.push(
				<div className="board-row" key={i}>
					{row}
				</div>
			);
		}

		return <div>{rows}</div>;
	}
}

class Game extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			history: [
				{
					squares: Array(9).fill(null),
				},
			],
			stepNumber: 0,
			xIsNext: true,
		};
	}

	handleClick(i) {
		const history = this.state.history.slice(0, this.state.stepNumber + 1);
		const current = history[history.length - 1];
		const squares = current.squares.slice();
		if (calculateWinner(squares) || squares[i]) {
			return;
		}
		squares[i] = this.state.xIsNext ? "X" : "O";
		this.setState({
			history: history.concat([
				{
					squares: squares,
				},
			]),
			stepNumber: history.length,
			xIsNext: !this.state.xIsNext,
		});
	}

	jumpTo(step) {
		this.setState({
			stepNumber: step,
			xIsNext: step % 2 === 0,
		});
	}

	render() {
		const history = this.state.history;
		const current = history[this.state.stepNumber];
		const winner = calculateWinner(current.squares);
		const moves = history.map((step, move) => {
			const desc = move ? "Go to move #" + move : "Go to game start";
			return (
				<li key={move}>
					<button onClick={() => this.jumpTo(move)}>{desc}</button>
				</li>
			);
		});

		let status;
		if (winner) {
			status = "Winner: " + current.squares[winner[0]]; // 勝者の記号を取得
		} else if (this.state.stepNumber === 9) {
			status = "It's a draw!"; // 引き分けの場合のメッセージ
		} else {
			status = "Next player: " + (this.state.xIsNext ? "X" : "O");
		}

		return (
			<div className="game">
				<div className="game-board">
					<Board
						squares={current.squares}
						onClick={(i) => this.handleClick(i)}
					/>
				</div>
				<div className="game-info">
					<div>{status}</div>
					<ol>{moves}</ol>
				</div>
			</div>
		);
	}
}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<Game />);

// calculateWinner 関数を修正して、勝者のマスのインデックスを返すように変更
function calculateWinner(squares) {
	const lines = [
		[0, 1, 2],
		[3, 4, 5],
		[6, 7, 8],
		[0, 3, 6],
		[1, 4, 7],
		[2, 5, 8],
		[0, 4, 8],
		[2, 4, 6],
	];
	for (let i = 0; i < lines.length; i++) {
		const [a, b, c] = lines[i];
		if (
			squares[a] &&
			squares[a] === squares[b] &&
			squares[a] === squares[c]
		) {
			return [a, b, c]; // 勝者のマスのインデックスを返す
		}
	}
	return null;
}
