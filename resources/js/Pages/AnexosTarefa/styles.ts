import styled from 'styled-components';

export const PageContainer = styled.div`
    padding: 3rem;
    min-height: 100vh;
    background: linear-gradient(120deg, #0a0a0f, #111827);
    color: #d1d5db;
    font-family: 'Orbitron', 'Inter', sans-serif;
`;

export const Header = styled.header`
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;

    h1 {
        font-size: 2.2rem;
        color: #60a5fa;
        text-shadow: 0 0 8px #3cf2ff;
    }

    a {
        padding: 0.7rem 1.4rem;
        font-weight: bold;
        color: #fff;
        background: linear-gradient(135deg, #8b5cf6, #3cf2ff);
        box-shadow: 0 0 10px rgba(139, 92, 246, 0.3);
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;

        &:hover {
            background: #3cf2ff;
            color: #111827;
            box-shadow: 0 0 20px #3cf2ff;
        }
    }
`;

export const Table = styled.table`
    width: 100%;
    background: rgba(17, 24, 39, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.04);
    overflow: hidden;
    border-collapse: collapse;
`;

export const Thead = styled.thead`
    background: rgba(255, 255, 255, 0.04);

    th {
        padding: 1.2rem;
        text-align: left;
        color: #60a5fa;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
`;

export const Tbody = styled.tbody`
    td {
        padding: 1.2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.03);
        color: #d1d5db;
    }

    tr:hover {
        background: rgba(255, 255, 255, 0.02);
    }

    td:last-child {
        display: flex;
        gap: 0.75rem;
    }

    button {
        background: transparent;
        border: none;
        color: #f87171;
        font-weight: bold;
        cursor: pointer;

        &:hover {
            color: #f43f5e;
            text-shadow: 0 0 6px #f43f5e;
        }
    }
`;
